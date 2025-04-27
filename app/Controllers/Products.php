<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        return view('products/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $this->productModel->save([
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
            ]);
            return redirect()->to('/products');
        }
        return view('products/create');
    }

    public function edit($id = null)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw PageNotFoundException::forPageNotFound("Product with ID $id not found");
        }

        if ($this->request->getMethod() === 'post') {
            $this->productModel->update($id, [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
            ]);
            return redirect()->to('/products');
        }

        return view('products/edit', ['product' => $product]);
    }

    public function delete($id = null)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            throw PageNotFoundException::forPageNotFound("Product with ID $id not found");
        }
        $this->productModel->delete($id);
        return redirect()->to('/products');
    }

    public function exportPdf()
    {
        $products = $this->productModel->findAll();

        $html = view('products/pdf', ['products' => $products]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('products.pdf', ['Attachment' => true]);
        exit;
    }

    public function exportExcel()
    {
        $products = $this->productModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Description');
        $sheet->setCellValue('D1', 'Price');

        $row = 2;
        foreach ($products as $product) {
            $sheet->setCellValue('A' . $row, $product['id']);
            $sheet->setCellValue('B' . $row, $product['name']);
            $sheet->setCellValue('C' . $row, $product['description']);
            $sheet->setCellValue('D' . $row, $product['price']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="products.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
