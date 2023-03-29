<?php

namespace App\Services;

use App\Constants\UserConst;
use App\Models\Attributes;
use App\Models\Products;
use App\Repositories\AttributesRepository;
use App\Repositories\AttributeValuesRepository;
use App\Repositories\AttributesVariablesRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductVariablesRepository;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use SplFileInfo;

class ProductsService
{

    protected $productsRepository;
    protected $attributeValuesRepository;
    protected $attributesRepository;
    protected $productVariablesRepository;
    protected $attributesVariablesRepository;
    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository, AttributesVariablesRepository $attributesVariablesRepository, AttributesRepository $attributesRepository, AttributeValuesRepository $attributeValuesRepository, ProductVariablesRepository $productVariablesRepository)
    {

        $this->productsRepository = $productsRepository;
        $this->attributeValuesRepository = $attributeValuesRepository;
        $this->attributesRepository = $attributesRepository;
        $this->productVariablesRepository = $productVariablesRepository;
        $this->attributesVariablesRepository = $attributesVariablesRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function create($data = [])
    {
        // dd($data['dataProduct']->title);

        $product = [
            'title' => $data['dataProduct']->title,
            'description' => $data['dataProduct']->description,
            'status' => ($data['dataProduct']->status == 'Published') ? '0' : '1',
            'slug' => Str::slug($data['dataProduct']->title),
            'categories' => $data['dataProduct']->categories,
            'tags' => $data['dataProduct']->tags,
            'thumbnail' => Cloudinary::upload($data['thumbnail']->getRealPath())->getSecurePath()
        ];


        $addProducts = $this->productsRepository->create($product);

        $variables = [];
        foreach ($data['variables'] as $variable) {
            $vars = [
                'import_price' => $variable->import_price,
                'stocks' => $variable->stocks,
                'color' => $variable->color,
                'size' => $variable->size
            ];
            array_push($variables, $vars);
        }

        $proVariables = [];
        $attrVariables = [];

        foreach ($variables as $a) {

            $color = [
                'value' => $a['color'],
                'attribute_id' => Attributes::where(['name' => 'Color'])->value('id')
            ];

            $size = [
                'value' => $a['size'],
                'attribute_id' => Attributes::where(['name' => 'Size'])->value('id')
            ];
            $colorAttrValue = $this->attributeValuesRepository->create($color);
            $sizeAttrValue = $this->attributeValuesRepository->create($size);

            $attrValuesIds[] = $colorAttrValue->id;
            $attrValuesIds[] = $sizeAttrValue->id;


            $proVariables = [
                'import_price' => $a['import_price'],
                'stocks' => $a['stocks'],
                'product_id' => $addProducts['id']
            ];

            $productVariables = $this->productVariablesRepository->create($proVariables);

            $attrVariables = [
                'attribute_value_id' => $attrValuesIds,
                'product_variable_id' => $productVariables['id']
            ];

            $attributeVariables = $this->attributesVariablesRepository->create($attrVariables);
        }



    }

    public function getAll()
    {
        return $this->productsRepository->getAll();

    }

}
