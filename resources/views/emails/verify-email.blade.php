<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verificação de E-mail</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 40px;">

    <div style="max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">

        <h2 style="color: #4F46E5;">Verificação de e-mail</h2>
        <p>Olá, <strong>{{ $name }}</strong>.</p>
        <p style="color: #4b5563;">
            Seja bem vindo(a) ao nosso sistema.
            Clique no botão abaixo para verificar seu e-mail:
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}"
               style="background-color: #4f46e5; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: bold;">
                Verificar E-mail
            </a>
        </div>

        <p style="color: #6b7280; font-size: 14px;">
            Se você não criou uma conta, ignore este e-mail.
        </p>

        <hr style="margin: 30px 0;">

        <p style="font-size: 12px; color: #9ca3af;">
            © {{ date('Y') }} TaskFlow. Todos os direitos reservados.
        </p>

    </div>
</body>
</html>
