# Diretório `/var`

Um diretório para ser compartilhado com *contâneirs*, para que eles possam
escrever e ter informações persistadas entre diferentes execuções:

* Banco de Dados MySQL
* Logs de execução do servidor web

Como os arquivos existente debaixo deste diretório são efêmeros (são úteis para 
_debug_ mas não essenciais par aplicação) tudo é ignorado através do 
`.gitignore` na raiz do repositório
