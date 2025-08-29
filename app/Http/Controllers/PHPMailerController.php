<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller {

    // =============== [ Email ] ===================
    public function email() {
        return view("email");
    }


    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->Host = 'mail.idlefasilkom.blog';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = '_mainaccount@idlefasilkom.blog';   //  sender username
            $mail->Password = 'v$PQ++f:91';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom('_mainaccount@idlefasilkom.blog', 'Panitia IDLe');
            $mail->addAddress($request->emailRecipient);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('sender@example.com', 'SenderReplyName');

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $request->emailSubject;
            $mail->Body    = $request->emailBody;

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                dd('a');
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            
            else {
                dd('b');
                return back()->with("success", "Email has been sent.");
            }

        } catch (Exception $e) {
                dd('c');
             return back()->with('error','Message could not be sent.');
        }
    }
}
