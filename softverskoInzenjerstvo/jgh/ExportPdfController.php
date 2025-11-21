<?php

namespace Lycoreco\Apps\Recipes\Controllers;

use FPDF;
use Lycoreco\Apps\Recipes\Models\RecipeModel;
use Lycoreco\Apps\Recipes\Utils\RecipePDF;
use Lycoreco\Includes\BaseController;
use Lycoreco\Includes\Routing\HttpExceptions;

class ExportPdfController extends BaseController
{
    protected $template_name = APPS_PATH . '/Recipes/Templates/export-pdf.php';

    protected function get_model()
    {
        if (isset($this->__model))
            return $this->__model;

        $this->__model = RecipeModel::get(
            array(
                [
                    'name'      => 'obj.id',
                    'type'      => '=',
                    'value'     => $this->url_context['url_1']
                ]
            )
        );
        if (empty($this->__model))
            throw new HttpExceptions\NotFound404('Recipe not found');

        return $this->__model;
    }

    public function get_context_data()
    {
        $context = parent::get_context_data();
        $recipe = $this->get_model();

        $fpdf = new RecipePDF($recipe);
        $fpdf->PrintRecipe();

        $context['fpdf'] = $fpdf;
        return $context;
    }
}
