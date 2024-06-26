<?php
require('fpdf.php');
class PDF extends FPDF
{
    var $widths;
    var $aligns;
    var $lineHeight;

    function Header()
    {
        // Set the timezone to GMT+8
        date_default_timezone_set('Asia/Manila');

        $this->SetMargins(15, 15);

        // Add the first image
        $this->Image('assets/images/montalban-logo.png', 10, 10, 30);

        // Add the second image
        $this->Image('assets/images/cdm-logo.png', 170, 10, 30);

        // Position for the header text
        $this->SetY(10); // Set Y position for the text

        // Add header text, centered
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 5, 'Province of Rizal', 0, 1, 'C');
        $this->Cell(0, 5, 'Municipality of Rodriguez', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 5, 'Colegio de Montalban', 0, 1, 'C');

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'Kasiglahan Village, San Jose Rodriguez, Rizal', 0, 1, 'C');

        // Position for the line divider
        $this->SetY(35); // Adjust Y position for the divider
        $this->Cell(0, 6, '____________________________________________________________________________________________', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, "Results of the Students Evaluation of Teacher's Performance", 0, 1, 'C');

        $this->SetY(48);
        $this->Cell(0, 10, "Second Semester, Academic Year 2023-2024", 0, 1, 'C');

        // Add the current generation time in GMT+8
        // $this->Ln(10);
        $this->SetFont('Arial', '', 10);
        $date = new DateTime();
        $formattedDate = $date->format('M-d-Y h:i A');

        $this->Cell(0, 5, 'System generated on: ' . $formattedDate, 0, 1, 'C');

        $this->Ln(7);
    }

    //Set the array of column widths
    function SetWidths($w)
    {
        $this->widths = $w;
    }

    //Set the array of column alignments
    function SetAligns($a)
    {
        $this->aligns = $a;
    }

    //Set line height
    function SetLineHeight($h)
    {
        $this->lineHeight = $h;
    }

    //Calculate the height of the row
    function Row($data)
    {
        // number of line
        $nb = 0;

        // loop each data to find out greatest line number in a row.
        for ($i = 0; $i < count($data); $i++) {
            // NbLines will calculate how many lines needed to display text wrapped in specified width.
            // then max function will compare the result with current $nb. Returning the greatest one. And reassign the $nb.
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        }

        //multiply number of line with line height. This will be the height of current row
        $h = $this->lineHeight * $nb;

        //Issue a page break first if needed
        $this->CheckPageBreak($h);

        //Draw the cells of current row
        for ($i = 0; $i < count($data); $i++) {
            // width of the current col
            $w = $this->widths[$i];
            // alignment of the current col. if unset, make it left.
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h);
            //Print the text
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //calculate the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
}
