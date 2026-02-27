<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Redefinir senha</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px;">

        <h2 style="color: #4F46E5;">Redefinição de Senha</h2>

        <p>Olá, <strong>{{ $user->name ?? 'usuário' }}</strong>.</p>

        <p style="color: #4b5563;">
            Você solicitou a redefinição de senha.
        </p>

        <p style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}"
                style="background-color: #4F46E5; color: white; padding: 12px 20px; text-decoration: none; border-radius: 6px;">
                Redefinir Senha
            </a>
        </p>
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
