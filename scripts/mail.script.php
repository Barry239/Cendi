<?php

    // Composer autoload
    require '../vendor/autoload.php';

    $MJ_APIKEY_PUBLIC = '';
    $MJ_APIKEY_PRIVATE = '';
    
    $mj = new \Mailjet\Client($MJ_APIKEY_PUBLIC, $MJ_APIKEY_PRIVATE, true, [ 'version' => 'v3.1' ]);
    
    function setMailContent($recipientEmail, $recipientName, $fileName, $fileContent) {
        $SENDER_EMAIL = '';
        $TEMPLATE_ID = 0;

        return [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "$SENDER_EMAIL",
                        'Name' => 'ESCOM - IPN'
                    ],
                    'To' => [
                        [
                            'Email' => "$recipientEmail",
                            'Name' => "$recipientName"
                        ]
                    ],
                    'Attachments' => [
                        [
                            'ContentType' => 'application/pdf',
                            'Filename' => "$fileName",
                            'Base64Content' => "$fileContent"
                        ]
                    ],
                    'TemplateID' => $TEMPLATE_ID,
                    'TemplateLanguage' => true,
                    'Subject' => 'Registro Cendi',
                    'Variables' => json_decode("{\"RECIPIENT_NAME\": \"$recipientName\"}", true)
                ]
            ]
        ];
    }

?>