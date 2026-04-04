<?php
// require 'vendor/autoload.php'; // Include Dompdf (if using Composer)

use Dompdf\Dompdf;
use Dompdf\Options;

// Create a new Dompdf instance
$options = new Options();
$options->set('defaultFont', 'Courier'); // Set default font
$dompdf = new Dompdf($options);

// Sample invoice HTML content
$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { width: 100%; padding: 20px; border: 1px solid #eee; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2>Invoice</h2>
        <p>Invoice No: #12345</p>
        <p>Date: ' . date("Y-m-d") . '</p>
        <table>
            <tr>
                <th>Item</th><th>Quantity</th><th>Price</th><th>Total</th>
            </tr>
            <tr>
                <td>Product 1</td><td>2</td><td>$10</td><td>$20</td>
            </tr>
            <tr>
                <td>Product 2</td><td>1</td><td>$15</td><td>$15</td>
            </tr>
            <tr class="total">
                <td colspan="3">Grand Total</td><td>$35</td>
            </tr>
        </table>
    </div>
</body>
</html>';

// Load HTML content into Dompdf
$dompdf->loadHtml($html);

// (Optional) Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();

// Output the PDF as a download
$dompdf->stream("invoice.pdf", ["Attachment" => false]); // Set to true for download
?>
