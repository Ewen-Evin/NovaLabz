<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/load_env.php';
require __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Erreur : Méthode non autorisée.";
    exit;
}

// Récupération des données
$name = htmlspecialchars($_POST["name"] ?? '');
$company = htmlspecialchars($_POST["company"] ?? '');
$email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($_POST["phone"] ?? '');
$project = htmlspecialchars($_POST["project"] ?? '');
$budget = htmlspecialchars($_POST["budget"] ?? '');
$deadline = htmlspecialchars($_POST["deadline"] ?? '');
$form_type = $_POST["form_type"] ?? '';

// Validation
if (empty($name) || empty($email) || empty($project)) {
    echo "Erreur : Tous les champs obligatoires doivent être remplis.";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Erreur : Format d'email invalide.";
    exit;
}

// Traduction des valeurs des sélecteurs
$budget_labels = [
    '500-1k' => '500€ - 1 000€',
    '1-3k' => '1 000€ - 3 000€',
    '3-5k' => '3 000€ - 5 000€',
    '5-8k' => '5 000€ - 8 000€',
    '8-12k' => '8 000€ - 12 000€',
    '12-18k' => '12 000€ - 18 000€',
    '18-25k' => '18 000€ - 25 000€',
    '25-30k' => '25 000€ - 30 000€',
    '30k+' => '30 000€ et plus',
    'undefined' => 'À définir'
];

$deadline_labels = [
    'urgent' => 'Urgent (moins d\'1 mois)',
    '1-3months' => '1-3 mois',
    '3-6months' => '3-6 mois',
    '6months+' => '6 mois et plus',
    'flexible' => 'Flexible'
];

$budget_display = $budget_labels[$budget] ?? $budget;
$deadline_display = $deadline_labels[$deadline] ?? $deadline;

// Configuration SMTP
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

try {
    // Configuration SMTP (utilise les mêmes paramètres que le portfolio)
    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USERNAME'];
    $mail->Password = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $_ENV['MAIL_PORT'];
    
    // Expéditeur (depuis le formulaire)
    $mail->setFrom($_ENV['MAIL_FROM'], 'NovaLabz Contact Form');
    
    // Destinataire (ton email)
    $mail->addAddress($_ENV['MAIL_TO']);
    
    // Répondre à → l'utilisateur
    $mail->addReplyTo($email, $name);
    
    // Sujet selon le type de formulaire
    $subject = "Nouvelle demande partenaire NovaLabz";
    if ($company) {
        $subject .= " - $company";
    }
    $mail->Subject = $subject;
    
    // Corps du message en HTML
    $mail->isHTML(true);
    
    $mail->Body = "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #00D4FF 0%, #7B54F7 100%); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #00D4FF; }
            .value { color: #333; }
            .separator { border-top: 2px solid #7B54F7; margin: 30px 0; }
            .footer { margin-top: 30px; font-size: 12px; color: #666; text-align: center; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>🚀 Nouvelle Demande Partenaire</h1>
                <p>NovaLabz - Formulaire de contact</p>
            </div>
            <div class='content'>
                <div class='field'>
                    <span class='label'>👤 Nom :</span>
                    <span class='value'>$name</span>
                </div>
                " . ($company ? "
                <div class='field'>
                    <span class='label'>🏢 Entreprise :</span>
                    <span class='value'>$company</span>
                </div>
                " : "") . "
                <div class='field'>
                    <span class='label'>📧 Email :</span>
                    <span class='value'>$email</span>
                </div>
                " . ($phone ? "
                <div class='field'>
                    <span class='label'>📞 Téléphone :</span>
                    <span class='value'>$phone</span>
                </div>
                " : "") . "
                <div class='field'>
                    <span class='label'>💰 Budget estimé :</span>
                    <span class='value'>$budget_display</span>
                </div>
                <div class='field'>
                    <span class='label'>📅 Délai souhaité :</span>
                    <span class='value'>$deadline_display</span>
                </div>
                <div class='separator'></div>
                <div class='field'>
                    <div class='label'>💡 Description du projet :</div>
                    <div class='value' style='white-space: pre-wrap; background: white; padding: 15px; border-radius: 5px; border-left: 4px solid #00D4FF; margin-top: 10px;'>
                        " . nl2br($project) . "
                    </div>
                </div>
                <div class='footer'>
                    <p>📩 Cet email a été envoyé depuis le formulaire de contact de NovaLabz</p>
                    <p>🕐 Date d'envoi : " . date('d/m/Y H:i:s') . "</p>
                    <p>🔗 Lien : https://novalabz.fr</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Version texte brut (pour les clients email qui ne supportent pas HTML)
    $mail->AltBody = "NOUVELLE DEMANDE PARTENAIRE NOVALABZ\n\n" .
                    "Nom : $name\n" .
                    ($company ? "Entreprise : $company\n" : "") .
                    "Email : $email\n" .
                    ($phone ? "Téléphone : $phone\n" : "") .
                    "Budget estimé : $budget_display\n" .
                    "Délai souhaité : $deadline_display\n\n" .
                    "PROJET :\n" .
                    "$project\n\n" .
                    "---\n" .
                    "Envoyé depuis le formulaire de contact de NovaLabz\n" .
                    "Date : " . date('d/m/Y H:i:s') . "\n" .
                    "Site : https://novalabz.fr";
    
    // Envoi de l'email
    $mail->send();
    
    // Envoi d'une confirmation à l'utilisateur
    sendConfirmationEmail($email, $name);
    
    echo "Succès : Votre demande a été envoyée. Nous vous répondrons sous 24h.";
    
} catch (Exception $e) {
    echo "Erreur : Impossible d'envoyer l'email. Veuillez réessayer plus tard.";
    error_log("Erreur SMTP NovaLabz : " . $mail->ErrorInfo);
}

// Fonction pour envoyer une confirmation à l'utilisateur
function sendConfirmationEmail($userEmail, $userName) {
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $_ENV['MAIL_PORT'];
        
        $mail->setFrom($_ENV['MAIL_FROM'], 'NovaLabz');
        $mail->addAddress($userEmail, $userName);
        
        $mail->Subject = "✅ Confirmation de votre demande - NovaLabz";
        $mail->isHTML(true);
        
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #0A0A15 0%, #0A1A4A 50%, #1a1a2e 100%); color: white; padding: 30px; text-align: center; border-radius: 10px; }
                .logo { font-size: 28px; font-weight: 800; background: linear-gradient(135deg, #FFFFFF 0%, #00D4FF 50%, #7B54F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 20px; }
                .content { background: white; padding: 30px; border-radius: 10px; margin-top: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
                .cta { background: linear-gradient(135deg, #00D4FF 0%, #7B54F7 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 20px 0; }
                .footer { margin-top: 30px; font-size: 12px; color: #666; text-align: center; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <div class='logo'>NovaLabz</div>
                    <h1>Merci pour votre intérêt ! 🚀</h1>
                </div>
                <div class='content'>
                    <p>Bonjour <strong>$userName</strong>,</p>
                    <p>Nous avons bien reçu votre demande de partenariat et nous vous en remercions.</p>
                    <p>Notre équipe étudie votre projet avec attention et vous répondra dans les <strong>24 heures ouvrables</strong>.</p>
                    <p>En attendant, vous pouvez :</p>
                    <ul>
                        <li>👀 Découvrir notre compte à rebours sur <a href='https://novalabz.fr'>novalabz.fr</a></li>
                        <li>📱 Nous suivre sur nos réseaux sociaux</li>
                        <li>💡 Explorer nos services de développement web</li>
                    </ul>
                    <p>À très bientôt,</p>
                    <p><strong>L'équipe NovaLabz</strong><br>
                    <em>Exploring the Future of Web Creation</em></p>
                </div>
                <div class='footer'>
                    <p>Cet email a été envoyé automatiquement suite à votre demande sur NovaLabz</p>
                    <p>© 2026 NovaLabz - Tous droits réservés</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $mail->AltBody = "CONFIRMATION DE DEMANDE - NOVALABZ\n\n" .
                        "Bonjour $userName,\n\n" .
                        "Nous avons bien reçu votre demande de partenariat et nous vous en remercions.\n" .
                        "Notre équipe étudie votre projet avec attention et vous répondra dans les 24 heures ouvrables.\n\n" .
                        "En attendant, vous pouvez découvrir notre compte à rebours sur https://novalabz.fr\n\n" .
                        "À très bientôt,\n" .
                        "L'équipe NovaLabz\n" .
                        "Exploring the Future of Web Creation\n\n" .
                        "---\n" .
                        "Cet email a été envoyé automatiquement suite à votre demande sur NovaLabz\n" .
                        "© 2026 NovaLabz - Tous droits réservés";
        
        $mail->send();
        
    } catch (Exception $e) {
        error_log("Erreur confirmation email: " . $mail->ErrorInfo);
    }
}
?>