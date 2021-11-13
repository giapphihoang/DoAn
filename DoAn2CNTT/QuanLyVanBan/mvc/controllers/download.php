<?php
class download extends Controller
{
    public function show($id = 0)
    {
        $id = (int) $id;
        if ($id>0) {
            $downloadModel = $this->model("downloadModel");
            $data = $downloadModel->download($id);
            header('Content-Description: File Transfer');
            header('Content-Type: '.$data['type']);
            header('Content-Disposition: attachment; filename="HKLteam - '.$data['name'].'"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . $data['size']);
            readfile($data['link']);
        }
    }
}
