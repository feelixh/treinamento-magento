#### treinamento-magento

<h1 align="center">
    🔨 Instalação Magento 2.4
</h1>
<p align="center">Esse guia descreve o passo-a-passo para instalação do Magento 2.4 a partir do Docker Compose.</p>


### Requisitos
- [Docker Engine](https://docs.docker.com/engine/install/ubuntu/)
- [Pós Instalação Docker no Linux](https://docs.docker.com/engine/install/linux-postinstall/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Passo-a-passo 
1.  Baixar e extrair o projeto em seu local de preferência.
    [Download](https://github.com/feelixh/treinamento-magento/raw/develop/Installation/magento2.4.zip)
    
2. Abrir o projeto através do terminal, e conceder permissões de acesso:
    > sudo chmod -Rf 777 *

3. Conceder permissão de execução de scripts ao diretório /bin:
    > chmod +x *

4. Executar o comando de criação e instalação do projeto:
    > ./bin/create-project

5. Conceder novamente permissões de acesso ao diretório:
    > sudo chmod -Rf 777 *

6. Adicionar a url "local.magento.com" ao arquivo de hosts apontando para o endereço local e salvar:
    > vim /etc/hosts

    Demonstração:
<p align="center">
  <img src="https://raw.githubusercontent.com/feelixh/treinamento-magento/develop/Installation/img/hosts.png" width="400" title="Demonstração">
</p>

7. Com o projeto instalado, você pode abrir o bash (CLI):
    > ./bin/bash

8. Dentro do CLI, pode utilizar comandos do Magento. Comece com:
    > magento setup:di:compile
   
9. Após, teste acessando as urls:
    - local.magento.com
    - local.magento.com/admin
    
#### Acesso ao painel admin:

login: admin

senha: admin123



## Contribuintes

- [Tadeu Rodrigues](https://github.com/TadeuRodrigues)
