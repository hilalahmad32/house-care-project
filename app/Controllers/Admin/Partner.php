<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Partner as ModelsPartner;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Partner extends BaseController
{
    public function index()
    {
        $partner = new ModelsPartner();
        $partners = $partner->orderBy('part_id', 'DESC')->paginate(3);
        $data = [
            'partners' => $partners,
            'pager' => $partner->pager
        ];
        return view('admins/partners', $data);
    }
    public function active($id)
    {
        $partner = new ModelsPartner();
        $partners = $partner->find($id);
        $data = [
            'status' => 1
        ];
        $partner->update($id, $data);
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host         = 'smtp.mailtrap.io'; //smtp.google.com
            $mail->SMTPAuth     = true;
            $mail->Username     = '88756bf727da7b';
            $mail->Password     = '142c913fbdc2f5';
            $mail->Port         = 587;
            $mail->Subject      = 'approve vendor';
            $mail->Body         = '<h3> Welcome ' . $partners['name'] . '</h3>
            <p>click on bellow button to activate your account</p>
            <a href="http://localhost:8080/partner/login/" >Click on link</a>';
            $mail->setFrom('programmerhero6@gmail.com', 'hilalahmad');

            $mail->addAddress('programmerhero6@gmail.com');
            $mail->isHTML(true);

            if (!$mail->send()) {
                echo "Something went wrong. Please try again.";
            } else {
                echo "Email sent successfully.";
                return redirect()->to('/admin/partners');
            }
        } catch (Exception $e) {
            echo "Something went wrong. Please try again.";
        }
    }
}
