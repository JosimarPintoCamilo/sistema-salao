/login:
    - exibe um formulario com um campo de emial e um botao
    - ao submeter redireciona para /validate

/validate:
    - busco ou crio o usuario
    - gero um codigo de verificacao salvo no usuario
    - envio o email de verificao
    - redireciono para /verification

/verification:
    - exibe um formulario com um campo para informar o codigo e um botao
    - redireciono para /verification-two

/verification-two
    - se o codigo informado corresponder com o gerado: 
        - faço login do usuario 
        - redireciono para a dashboard
    - se não:
        - redireciono para /verification-two com mensagem de erro