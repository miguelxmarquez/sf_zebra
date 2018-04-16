<?php

class Imp {

    private $nombre;
    private $contacto;
    private $cliente_telf;
    private $cliente_mail;
    private $cliente;
    private $cliente_dir;
    private $remitente;
    private $remitente_telf;
    private $remitente_dir;
    //Texto final
    private $text_end_1;
    private $text_end_2;
    private $separator = '-';
    private $width = 42;
    //Caraceteres ESC/P
    private $line_break = "\\x0A";
    private $start_imp = "\\x1B' + '\\x40";
    private $cut = "'\\x1B' + '\\x69'"; // cut paper
    private $end_imp = "'\\x0A' + '\\x0A' + '\\x0A' + '\\x0A' + '\\x0A' + '\\x0A' + '\\x0A";
    //Longitud de la referencia
    private $width_ref = 17;
    //Logitud de la descripcion
    private $width_desc = 35;
    private $line;
    //Caracter utiliza al inicio de cada linea de la factura
    private $start_character = "'";
    //Caracter utiliza al fin de cada linea de la factura
    private $end_character = "',\n";
    //Contine la factura generada
    private $imp;

    public function __construct($info) {
        extract($info);

        $this->nombre = $nombre;
        $this->contacto = $contacto;
        $this->cliente_telf = $cliente_telf;
        $this->cliente_mail = $cliente_mail;
        $this->cliente = $cliente;
        $this->cliente_dir = $cliente_dir;
        $this->remitente = $remitente;
        $this->remitente_telf = $remitente_telf;
        $this->remitente_dir = $remitente_dir;
        $this->date = $date;
        $this->time = $time;

    }

    /*
     *
     */

    private function generateLine() {
        $this->line = str_pad($this->separator, $this->width, $this->separator);
    }

    /*
     * Genera la informacion de la cabecera de la factura
     */

    public function GenerateDestinatario() {
        //Separador
        $text = $this->line;
        $this->imp .= $this->start_character . $text . $this->end_character;
        // Texto dentro de Separadores
        $text = '               DESTINATARIO               ';
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Separador
        $text = $this->line;
        $this->imp .= $this->start_character . $text . $this->end_character;

        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Contacto
        $text = str_pad($this->contacto, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Cliente
        $text = str_pad($this->cliente, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Cliente Numero
        $text = str_pad($this->cliente_telf, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Cliente Email
        $text = str_pad($this->cliente_mail, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Cliente Direccion
        $text = str_pad($this->cliente_dir, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;



    }

    /*
     * Genera la cabecera del inicio de los productos de la compra
     */

    private function GenerateRemitente() {
        //Separador
        $text = $this->line;
        $this->imp .= $this->start_character . $text . $this->end_character;
        $text = '                 REMITENTE                ';
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Separador
        $text = $this->line;
        $this->imp .= $this->start_character . $text . $this->end_character;

        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Remitente
        $text = str_pad($this->remitente, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Remitente Telefono
        $text = str_pad($this->remitente_telf, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        // Remitente Direccion
        $text = str_pad($this->remitente_dir, $this->width, " ", STR_PAD_BOTH);
        $this->imp .= $this->start_character . $text . $this->end_character;
        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;

        //Linea en blanco
        $text = $this->line_break;
        $this->imp .= $this->start_character . $text . $this->end_character;
    }

    /*
     * Genera las lineas de la ETIQUETA0
     */

    private function imprime($tag) {
        foreach ($tag as $lines) {

            $line = '';

            $ref = substr($lines['ref'], 0, $this->width_ref);
            $desc = substr($lines['desc'], 0, $this->width_desc);

            $line = str_pad($ref, $this->width_ref, " ");
            $line .= ' ' . $lines['qty'] . 'x$' . number_format($lines['price_unit'], 0, ',', '.');

            $line = str_pad($line, $this->width - 9, " ");
            $line .= number_format($lines['price'], 0, ',', '.');

            $this->imp .= $this->start_character . $line . $this->end_character;
            //Linea en blanco
            $text = $this->line_break;
            $this->imp .= $this->start_character . $text . $this->end_character;

            //Nombre del producto
            $this->imp .= $this->start_character . '     ' . strtoupper($desc) . $this->end_character;
            //Linea en blanco
            $text = $this->line_break;
            $this->imp .= $this->start_character . $text . $this->end_character;
        }
    }


    private function chunk($str, $l = 76) {
        $tmp = array_chunk(
                preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY), $l);
        $str = "";
        foreach ($tmp as $t) {
            $str .= "'" . str_pad(join("", $t), $this->width, " ", STR_PAD_BOTH) . $this->end_character;

            //Linea en blanco
            $text = $this->line_break;
            $str .= $this->start_character . $text . $this->end_character;
        }
        return $str;
    }

    /*
     *
     */

    private function info()
    {
      # code...
      return true;
    }

    public function generate() {
        //Genera la linea que se utiliza como separador;
        $this->generateLine();
        //Genera la cebecera de la factura
        $this->GenerateDestinatario();
        //Cabecera de la compra
        $this->GenerateRemitente();
        // Etiquetas
        //$this->imprime($tag);
        $this->imp .= $this->end_imp . $this->end_character;
        $this->imp .= $this->cut;

        return $this->imp;
    }

}
