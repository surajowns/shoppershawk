<?php

namespace App\Exports;

use App\User;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct()
    {

    }
    public function collection()
    {
        
        $response=Product::get();
        return  $response;
    }

    public function map($product_list) : array {
        return [
            $product_list->id,
            $product_list->name,
            $product_list->model_no,
            $product_list->hsn_no,
            $product_list->price,
            $product_list->selling_price,
            $product_list->gst,
            $product_list->qty,
            $product_list->created_at,
            $product_list->updated_at,
        ] ;
 
 
    }

    public function headings(): array
    {
        return [
            'S.NO',
            'Name',
            'Model No',
            'HSN No',
            'Price',
            'Selling Price',
            'GST',
            'Quantity',
            'Uploaded Date',
            'Updated Date',
          
          
        ];
    }
}
