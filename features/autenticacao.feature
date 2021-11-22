/login:
    - exibe um formulario com um campo de emial e um botao
    - ao submeter redireciona para /validate

/validate:
    - busco um usuario com aquele email, se não existir eu crio
    - gero um codigo de verificacao e salvo no usuario
    - envio um email de verificao
    - mostro a view com formulario para confirmar o codigo
    - ao submeter redireciono para /verification

/verification:
    - verifico se o código informado é o mesmo que o código no usuário
    - se for, eu salvo esse usuário na sessao e redireciono para a dashboard
    - se não, redireciono para a página anterior e mostro uma mensagem de código inválido