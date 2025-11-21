<?php

namespace Lycoreco\Apps\Recipes\Utils;

use FPDF;
use Lycoreco\Apps\Recipes\Models\IngredientInRecipeModel;
use Lycoreco\Apps\Recipes\Models\RecipeModel;

class RecipePDF extends FPDF
{
    public RecipeModel $recipe;

    public function __construct(RecipeModel $recipe)
    {
        parent::__construct('P', 'mm', 'A4');
        $this->recipe = $recipe;
    }
    function Header()
    {
        $recipe = $this->recipe;

        // Background
        $this->SetTextColor(0, 139, 112);

        $this->SetFont('Arial', 'B', 16);
        $this->Image(BASE_PATH . '/assets/images/fridgeLogo.png', 10, 6, 20);
        $this->Cell(80);
        $this->Cell(30, 10, $recipe->field_title, 0, 0, 'C');
        $this->Ln(8);

        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(80);
        $this->Cell(30, 10, $recipe->category_name, 0, 0, 'C');
        $this->Ln(20);
    }
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Text color in gray
        $this->SetTextColor(128);
        // Page number
        $this->Cell(0, 3, 'Page ' . $this->PageNo(), 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 10, 'LycoReco', 0, 0, 'C');
    }

    function RecipeTable()
    {
        $header = array('Ingredient', 'Count');

        $ingredients = IngredientInRecipeModel::filter(array(
            [
                'name'      => 'obj.recipe_id',
                'type'      => '=',
                'value'     => $this->recipe->get_id()
            ]
        ));

        // Colors, line width and bold font
        $this->SetFillColor(0, 139, 122);
        $this->SetTextColor(255);
        $this->SetDrawColor(179, 179, 179);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(80, 35);
        $this->Cell(35);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();

        // Body
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        foreach ($ingredients as $ing) {
            $this->Cell(35);
            $this->Cell($w[0], 6, $ing->ingredient_name, 'LR', 0, 'L', false);
            $this->Cell($w[1], 6, $ing->get_count(), 'LR', 0, 'L', false);
            $this->Ln();
        }
        $this->Cell(35);
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln(10);
    }

    function RecipeContent()
    {
        $recipe = $this->recipe;

        $this->SetFont('Times', '', 14);
        $this->SetTextColor(0);
        $this->MultiCell(0, 5, txt: $recipe->field_instruction);
        $this->Ln();
        $this->SetFont('', 'I');
        $this->Cell(0, 5, '(Bon appetit!)');
    }


    public function PrintRecipe()
    {
        $this->SetTitle($this->recipe->field_title);
        $this->AddPage();
        $this->RecipeTable();
        $this->RecipeContent();
    }
}
