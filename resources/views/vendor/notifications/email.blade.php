<x-mail::message>
# @lang('Olá!')

{{-- Intro Lines --}}
Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.

{{-- Action Button --}}
<x-mail::button :url="$actionUrl" color="primary">
Redefinir Senha
</x-mail::button>

{{-- Outro Lines --}}
Este link de redefinição de senha expirará em 60 minutos.

Se você não solicitou uma redefinição de senha, ignore este e-mail.

{{-- Salutation --}}
@lang('Atenciosamente'),<br>
{{ config('app.name') }}

{{-- Subcopy --}}
<x-slot:subcopy>
@lang(
    "Se você está tendo problemas para clicar no botão \":actionText\", copie e cole o URL abaixo\n".
    'no seu navegador:',
    [
        'actionText' => 'Redefinir Senha',
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
</x-mail::message>
