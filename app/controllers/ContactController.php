<?php

class ContactController {
    
    public function traiter() {
        // Vérifier la méthode de requête
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            echo "Erreur : Méthode non autorisée.";
            exit;
        }
        
        // Charger PHPMailer et la configuration
        require __DIR__ . '/../../public/php/load_env.php';
        
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require __DIR__ . '/../../vendor/autoload.php';
        
        // Récupération et validation des données
        $name = htmlspecialchars($_POST["name"] ?? '');
        $company = htmlspecialchars($_POST["company"] ?? '');
        $email = filter_var($_POST["email"] ?? '', FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($_POST["phone"] ?? '');
        $project = htmlspecialchars($_POST["project"] ?? '');
        $budget = htmlspecialchars($_POST["budget"] ?? '');
        $deadline = htmlspecialchars($_POST["deadline"] ?? '');
        $form_type = $_POST["form_type"] ?? 'contact_novalabz';
        
        // Validation des champs obligatoires
        if (empty($name) || empty($email) || empty($project)) {
            echo "Erreur : Tous les champs obligatoires doivent être remplis.";
            exit;
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Erreur : Format d'email invalide.";
            exit;
        }
        
        // Traduction des valeurs
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
        
        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        
        try {
            // Configuration SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['MAIL_PORT'];
            
            // Expéditeur
            $mail->setFrom($_ENV['MAIL_FROM'], 'NovaLabz');
            
            // Destinataires
            $mail->addAddress('contact@novalabz.fr', 'NovaLabz');
            $mail->addBCC('ewenevin0@gmail.com', 'Ewen Evin');
            
            // Répondre à l'utilisateur
            $mail->addReplyTo($email, $name);
            
            // Sujet
            $subject = "Nouvelle demande de projet NovaLabz";
            if ($company) {
                $subject .= " - $company";
            } else {
                $subject .= " - $name";
            }
            $mail->Subject = $subject;
            
            // Corps du message HTML
            $mail->isHTML(true);
            $currentDate = date('d/m/Y H:i:s');
            
            $mail->Body = $this->generateEmailTemplate(
                $name, 
                $company, 
                $email, 
                $phone, 
                $project, 
                $budget_display, 
                $deadline_display, 
                $currentDate,
                $deadline
            );
            
            // Version texte brut
            $mail->AltBody = $this->generateTextTemplate(
                $name,
                $company,
                $email,
                $phone,
                $project,
                $budget_display,
                $deadline_display,
                $currentDate,
                $deadline
            );
            
            // Envoi de l'email principal
            $mail->send();
            
            // Envoi de la confirmation à l'utilisateur
            $this->sendConfirmationEmail($email, $name, $company, $budget_display, $deadline_display, $project);
            
            echo "Succès : Votre demande a été envoyée avec succès ! Nous vous contacterons sous 24h pour discuter de votre projet.";
            
        } catch (Exception $e) {
            echo "Erreur : Impossible d'envoyer votre demande. Veuillez nous contacter directement à contact@novalabz.fr";
            error_log("Erreur SMTP NovaLabz : " . $mail->ErrorInfo);
        }
    }
    
    private function generateEmailTemplate($name, $company, $email, $phone, $project, $budget, $deadline, $date, $deadline_raw) {
        $company_html = $company ? "<div class='info-value'><small>🏢 $company</small></div>" : "";
        $phone_html = $phone ? "<div class='info-value'><small>📱 $phone</small></div>" : "";
        
        $priority = $deadline_raw === 'urgent' ? 
            '<span class="priority-urgent">URGENT</span>' : 
            '<span class="priority-normal">NORMAL</span>';
        
        return "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <style>
                body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 700px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #0A0A15 0%, #0A1A4A 50%, #1a1a2e 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .header h1 { margin: 0; font-size: 24px; }
                .header p { opacity: 0.9; margin: 10px 0 0; }
                .content { background: #f9f9f9; padding: 40px; border-radius: 0 0 10px 10px; }
                .info-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 25px 0; }
                .info-card { background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #00D4FF; box-shadow: 0 3px 10px rgba(0,0,0,0.05); }
                .info-label { font-weight: 600; color: #7B54F7; font-size: 14px; margin-bottom: 5px; }
                .info-value { color: #333; font-size: 16px; }
                .project-box { background: white; padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0; margin: 30px 0; }
                .project-box pre { white-space: pre-wrap; font-family: 'Inter', sans-serif; line-height: 1.6; margin: 0; }
                .footer { margin-top: 40px; padding-top: 20px; border-top: 2px solid #7B54F7; font-size: 13px; color: #666; text-align: center; }
                .logo { font-size: 22px; font-weight: 800; background: linear-gradient(135deg, #FFFFFF 0%, #00D4FF 50%, #7B54F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
                .priority-urgent { background: #dc3545; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
                .priority-normal { background: #28a745; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <div class='logo'>NOVALABZ</div>
                    <h1>📋 Nouvelle Demande de Projet</h1>
                    <p>Reçue via le formulaire de contact</p>
                </div>
                
                <div class='content'>
                    <div class='info-grid'>
                        <div class='info-card'>
                            <div class='info-label'>👤 Contact</div>
                            <div class='info-value'>$name</div>
                            $company_html
                        </div>
                        
                        <div class='info-card'>
                            <div class='info-label'>📞 Coordonnées</div>
                            <div class='info-value'>$email</div>
                            $phone_html
                        </div>
                        
                        <div class='info-card'>
                            <div class='info-label'>💰 Budget estimé</div>
                            <div class='info-value'>$budget</div>
                        </div>
                        
                        <div class='info-card'>
                            <div class='info-label'>📅 Délai souhaité</div>
                            <div class='info-value'>$deadline</div>
                        </div>
                    </div>
                    
                    <div class='project-box'>
                        <div class='info-label'>💡 Description du projet</div>
                        <div class='info-value'><pre>" . htmlspecialchars($project) . "</pre></div>
                    </div>
                    
                    <div style='text-align: center; margin: 30px 0;'>
                        <div style='background: linear-gradient(135deg, rgba(0,212,255,0.1) 0%, rgba(123,84,247,0.1) 100%); padding: 20px; border-radius: 10px; border: 2px dashed #00D4FF;'>
                            <div style='font-weight: 600; color: #3A2DCE; margin-bottom: 10px;'>📋 Action requise :</div>
                            <div>1. Répondre au client sous 24h maximum</div>
                            <div>2. Programmer un appel de découverte</div>
                            <div>3. Préparer une proposition détaillée</div>
                        </div>
                    </div>
                    
                    <div class='footer'>
                        <p>📧 Cet email a été généré automatiquement depuis le formulaire de contact NovaLabz</p>
                        <p>🕐 Date de la demande : $date</p>
                        <p>🔗 <a href='https://novalabz.fr' style='color: #7B54F7;'>novalabz.fr</a> | 📞 Priorité : $priority</p>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
    }
    
    private function generateTextTemplate($name, $company, $email, $phone, $project, $budget, $deadline, $date, $deadline_raw) {
        $company_text = $company ? "Entreprise : $company\n" : "";
        $phone_text = $phone ? "Téléphone : $phone\n" : "";
        $priority = $deadline_raw === 'urgent' ? 'URGENT' : 'NORMAL';
        
        return "📋 NOUVELLE DEMANDE DE PROJET NOVALABZ\n\n" .
               "=== INFORMATIONS CLIENT ===\n" .
               "Nom : $name\n" .
               $company_text .
               "Email : $email\n" .
               $phone_text .
               "\n=== PROJET ===\n" .
               "Budget estimé : $budget\n" .
               "Délai souhaité : $deadline\n" .
               "\n=== DESCRIPTION ===\n" .
               "$project\n" .
               "\n=== ACTION REQUISE ===\n" .
               "1. Répondre au client sous 24h maximum\n" .
               "2. Programmer un appel de découverte\n" .
               "3. Préparer une proposition détaillée\n" .
               "\n---\n" .
               "📧 Envoyé depuis le formulaire de contact NovaLabz\n" .
               "🕐 Date : $date\n" .
               "🔗 Site : https://novalabz.fr\n" .
               "📞 Priorité : $priority";
    }
    
    private function sendConfirmationEmail($userEmail, $userName, $company, $budget, $deadline, $project) {
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        
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
            
            $mail->Subject = "Confirmation de votre demande - NovaLabz";
            $mail->isHTML(true);
            
            $company_text = $company ? " pour <strong>$company</strong>" : "";
            $reference = 'REF: NL-' . strtoupper(substr(md5($userEmail . time()), 0, 8));
            
            $mail->Body = "
            <!DOCTYPE html>
            <html lang='fr'>
            <head>
                <meta charset='UTF-8'>
                <style>
                    body { font-family: 'Inter', sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: linear-gradient(135deg, #0A0A15 0%, #0A1A4A 50%, #1a1a2e 100%); color: white; padding: 40px; text-align: center; border-radius: 10px; }
                    .logo { font-size: 32px; font-weight: 800; background: linear-gradient(135deg, #FFFFFF 0%, #00D4FF 50%, #7B54F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 20px; }
                    .content { background: white; padding: 40px; border-radius: 10px; margin-top: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
                    .highlight { background: linear-gradient(135deg, rgba(0,212,255,0.1) 0%, rgba(123,84,247,0.1) 100%); padding: 20px; border-radius: 10px; margin: 25px 0; border-left: 4px solid #00D4FF; }
                    .steps { margin: 25px 0; }
                    .step { display: flex; align-items: flex-start; margin-bottom: 15px; }
                    .step-number { background: linear-gradient(135deg, #00D4FF 0%, #7B54F7 100%); color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 15px; flex-shrink: 0; }
                    .footer { margin-top: 40px; font-size: 13px; color: #666; text-align: center; }
                    .reservation-code { background: linear-gradient(135deg, #00D4FF 0%, #7B54F7 100%); color: white; padding: 10px 20px; border-radius: 5px; font-family: monospace; font-size: 18px; letter-spacing: 2px; margin: 20px 0; text-align: center; }
                    .summary { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; }
                    .summary-item { display: flex; justify-content: space-between; margin-bottom: 10px; }
                    .summary-label { font-weight: 600; color: #7B54F7; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <div class='logo'>NOVALABZ</div>
                        <h1>✅ Demande Confirmée</h1>
                        <p>Merci pour votre intérêt pour NovaLabz</p>
                    </div>
                    
                    <div class='content'>
                        <p>Bonjour <strong>$userName</strong>$company_text,</p>
                        
                        <p>Votre demande a bien été reçue et est maintenant enregistrée dans notre système.</p>
                        
                        <div class='reservation-code'>$reference</div>
                        
                        <div class='highlight'>
                            <p><strong>📋 Prochaine étape :</strong></p>
                            <p>Notre équipe vous contactera dans les <strong>24 heures ouvrables</strong> pour :</p>
                        </div>
                        
                        <div class='steps'>
                            <div class='step'>
                                <div class='step-number'>1</div>
                                <div>
                                    <strong>Programmer un appel de découverte</strong><br>
                                    <small>30 minutes pour comprendre vos besoins en détail</small>
                                </div>
                            </div>
                            
                            <div class='step'>
                                <div class='step-number'>2</div>
                                <div>
                                    <strong>Étudier votre projet</strong><br>
                                    <small>Analyse technique et stratégique approfondie</small>
                                </div>
                            </div>
                            
                            <div class='step'>
                                <div class='step-number'>3</div>
                                <div>
                                    <strong>Préparer votre proposition</strong><br>
                                    <small>Devis détaillé et planning personnalisé</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class='summary'>
                            <p><strong>Résumé de votre demande :</strong></p>
                            <div class='summary-item'>
                                <span class='summary-label'>Budget estimé :</span>
                                <span>$budget</span>
                            </div>
                            <div class='summary-item'>
                                <span class='summary-label'>Délai souhaité :</span>
                                <span>$deadline</span>
                            </div>
                            <div class='summary-item'>
                                <span class='summary-label'>Date de la demande :</span>
                                <span>" . date('d/m/Y H:i:s') . "</span>
                            </div>
                        </div>
                        
                        <div class='project-description'>
                            <p><strong>💡 Description de votre projet :</strong></p>
                            <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 4px solid #00D4FF; margin-top: 10px;'>
                                <p style='white-space: pre-wrap; line-height: 1.6; margin: 0;'>" . nl2br(htmlspecialchars($project)) . "</p>
                            </div>
                        </div>
                        
                        <p>En attendant notre retour, vous pouvez visiter notre site pour en savoir plus sur nos services :</p>
                        <p style='text-align: center; margin: 20px 0;'>
                            <a href='https://novalabz.fr' style='display: inline-block; background: linear-gradient(135deg, #00D4FF 0%, #7B54F7 100%); color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600;'>Visiter NovaLabz.fr</a>
                        </p>
                        
                        <p>À très vite,</p>
                        <p><strong>L'équipe NovaLabz</strong><br>
                        <em>Exploring the Future of Web Creation</em></p>
                    </div>
                    
                    <div class='footer'>
                        <p>📧 Cet email de confirmation a été envoyé automatiquement suite à votre demande</p>
                        <p>© " . date('Y') . " NovaLabz - Tous droits réservés</p>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            $mail->send();
            
        } catch (Exception $e) {
            error_log("Erreur confirmation email: " . $mail->ErrorInfo);
        }
    }
}