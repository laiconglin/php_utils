    public function saveToDownloadFile() {
        $objWriter = new \PHPExcel_Writer_Excel2007($this->excelObj);
        $download_name = $this->downloadName;
        header("Content-Type: application/octet-stream");
        header('Content-Disposition:attachment;filename="' . $download_name . '"');
        header("Content-Transfer-Encoding: binary");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $objWriter->save('php://output');
    }
    
    public function setData($data = []) {
        $tmp_row_index = 2;
        $objActSheet = $this->excelObj->getActiveSheet();
        foreach ($data as $key => $wholeRowList) {
            $tmp_col_index = 'A';
            foreach ($wholeRowList as $val) {
                $objActSheet->setCellValueExplicit($tmp_col_index . $tmp_row_index, $val, \PHPExcel_Cell_DataType::TYPE_STRING);
                $tmp_col_index++;
            }
            $tmp_row_index++;
        }
    }
    
   public function setHeadersAndWidth($tmpHeaders = []) {
        $this->headers = $tmpHeaders;

        //渲染表头
        $tmp_col_index = 'A';
        foreach ($this->headers as $field => $width) {
            $this->excelObj->getActiveSheet()->setCellValue($tmp_col_index . '1', $field);
            $this->excelObj->getActiveSheet()->getColumnDimension($tmp_col_index)->setWidth($width);
            $tmp_col_index++;
        }
    }
