<?php

    // FPDF library
    require_once '../vendor/fpdf/fpdf.php';

    class PDF extends FPDF {
        function Header() {
            $this->Image('../assets/img/pdf/ipn.png', 8, 11, 33, 33);
            $this->Image('../assets/img/pdf/escom.png', 169, 14.5, 33, 25);
            $this->SetFont('Times', 'B', 26);
            $this->SetTextColor(104, 36, 68);
            $this->Multicell(0, 12, utf8_decode('Instituto Politécnico Nacional'), 0, 'C', 0);
            $this->SetFont('Times', 'B', 22);
            $this->Multicell(0, 12, utf8_decode('Escuela Superior de Cómputo'), 0, 'C', 0);
        }

        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }

        function printWelcome() {
            $this->SetFont('Arial', 'B', 16);
            $this->SetTextColor(0, 76, 153);
            $this->Multicell(0, 12, utf8_decode('¡Bienvenido a CENDI!'), 0, 'C', 0);
            $this->Ln(-5);
            $this->SetTextColor(0, 0, 0);
        }

        function printUser($userId, $firstname, $lastname, $email) {
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 16);
            $this->Multicell(0, 12, utf8_decode('Información registrada'), 0, 'C', 0);
            $this->Ln(5);
            $this->SetFont('Arial', '', 14);
            $this->SetDrawColor(0, 76, 153);
            $this->Cell(55, 8, utf8_decode('Datos personales'), 1, 0, 'C');
            $this->Ln(15);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(55, 6, 'UUID:', 0);
            $this->SetFont('Arial', '', 12);
            $this->Cell(115, 6, "$userId", 0);
            $this->Ln();
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(55, 6, 'Nombre:', 0);
            $this->SetFont('Arial', '', 12);
            $this->Cell(115, 6, utf8_decode("$firstname"), 0);
            $this->Ln();
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(55, 6, 'Apellidos:', 0);
            $this->SetFont('Arial', '', 12);
            $this->Cell(115, 6, utf8_decode("$lastname"), 0);
            $this->Ln();
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(55, 6, utf8_decode('Correo electrónico:'), 0);
            $this->SetFont('Arial', '', 12);
            $this->Cell(115, 6, utf8_decode("$email"), 0);
            $this->Ln();
        }
    }

?>
