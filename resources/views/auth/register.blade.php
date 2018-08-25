@extends('layouts.app')

@section('content')
<style>
    .form-signup {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }
    .form-signup .checkbox {
      font-weight: 400;
    }
    .form-signup .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .form-signup .form-control:focus {
      z-index: 2;
    }

</style>
<div class="row text-center mt-3">
    <div class="col-sm-12">
      <img class="mb-4" src="https://www.unicodono.com.br/web/img/topo/01.png" alt="" width="200">
    </div>
  </div>
  <form class="form-signup {{ $errors->has('name') ? ' has-error' : '' }}" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
      <h1 class="h3 mb-3 font-weight-normal text-center">Crie a sua conta</h1>
      <div class="form-group">
        <label for="inputName">Nome</label>
        <input type="text"  class="form-control" name="name" value="{{ old('name') }}" placeholder="Digite o seu nome" required="" autofocus="">
      </div>
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email"  class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite o seu e-mail" required="" autofocus="">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input class="form-control telefone" type="text" id="telefone" name="telefone" placeholder="Digite o seu telefone" value="" required>
      </div>
      <div class="form-group">
        <label for="documento" id="info_documento">CPF</label>
        <input class="form-control" type="text" id="documento" name="documento" value="" required>
        @if ($errors->has('documento'))
            <span class="help-block">
                <strong>{{ $errors->first('documento') }}</strong>
            </span>
        @endif
      </div>
      <div class="row text-center mb-2">
        <div class="form-check col-sm-6">
          <input class="form-check-input" type="radio" name="pessoa_fisica" id="cpf" value="1" checked>
          <label class="form-check-label" for="cpf">
            CPF
          </label>
        </div>
        <div class="form-check col-sm-6">
          <input class="form-check-input" type="radio" name="pessoa_fisica" id="cnpj" value="0">
          <label class="form-check-label" for="cnpj">
            CNPJ
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword {{ $errors->has('password') ? ' has-error' : '' }}">Senha</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Digite a sua senha" required="">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="inputConfirmPassword">Confirmar senha</label>
        <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation" placeholder="Digite a senha novamente" required="">
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck1" required>
          <label class="custom-control-label" for="customCheck1">
            <a class="link" data-toggle="modal" data-target="#exampleModalLong">
              Eu concordo com os termos de uso.
            </a>
          </label>
        </div>

      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Criar conta</button>
      <p class="mt-5 mb-3 text-muted text-center">Unicodono © Todos os direitos reservados</p>
    </form>
</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Termos de uso UNICODONO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="centerr pt30 pb20">
			<h1 class="fz25 CORR1">Termos de Uso</h1>
			<div class="pt10 fz14"><div class="editor taj"><div style="text-align:center">
<div style="text-align:left">
<p style="text-align:justify">A empresa GRUPO UNICO DONO SERVIÇOS LTDA, CNPJ 12.158.633/0001-01 é proprietária do site/portal www.unicodono.com.br.<br>
USUÁRIO(S): são as pessoas que acessam o Portal.<br>
ANUNCIANTE(S): são as pessoas ou empresas que veiculam seus anúncios ou publicidade no Portal.</p>

<p>Este documento visa informar as responsabilidades, deveres e obrigações que todo USUÁRIO ou ANUNCIANTE assume ao acessar o Portal UnicoDono.</p>

<p>O USUÁRIO deve ler com atenção os termos abaixo antes de acessar ou usar o Portal UnicoDono, pois o acesso ou uso deste implica em concordância com tais termos. O Portal UnicoDono, somente fornecera ao USUÁRIO informações e serviços mediante expressa concordância aos termos, condições e informações aqui contidas, assim como aos demais documentos incorporados ao mesmo por referência. O uso do Portal significa a total concordância com tais termos, condições e informações.</p>

<p>Os usuários e anunciantes reconhecem e concordam que todos os serviços e conteúdos, bem como qualquer aplicativo aqui disponível, têm uso restrito aos fins propostos neste website Internet e sujeitam-se, inclusive, à Lei sobre Proteção à Propriedade Intelectual de Programa de Computador e normas correlatas.</p>

<p>O uso indevido de materiais protegidos por propriedade intelectual (direito autoral, marcas comerciais, patentes etc.) apresentados no Portal UnicoDono será caracterizado como infração da legislação pertinente, sujeitando o infrator às ações judiciais cabíveis e dando ensejo à respectiva indenização aos prejudicados, seja ao Portal Único Dono, seja a terceiros, sem prejuízo de perdas e danos e honorários advocatícios.</p>

<p>Salvo quando expressamente autorizado, os usuários e anunciantes concordam em não modificar, alugar, vender, distribuir ou criar obras derivadas a partir dos aplicativos e dos serviços, no todo ou em partes, disponíveis no site.</p>

<p>Os anunciantes e usuários também não podem, salvo quando permitido, reproduzir, duplicar, copiar, vender, revender ou explorar com finalidade comercial qualquer parte dos aplicativos, serviços ou produtos oferecidos no website, seja no todo ou em partes.</p>

<p>Portal Único Dono apenas publica os anúncios e aponta os websites que contêm informações de interesse dos usuários. Portanto, o Portal não se responsabiliza pelo conteúdo dos anúncios e websites cadastrados, isto é, quanto a sua legalidade, veracidade, autenticidade, disponibilidade e atualização.</p>

<p>O Portal Único Dono se reserva o direito de não veicular anúncios que, no seu entender, sejam de alguma forma prejudiciais ou ofensivos aos seus usuários, anunciantes, ou ao próprio Portal Único Dono;</p>

<h2 style="text-align:justify">Garantia Limitada</h2>

<p style="text-align:justify">O atual estágio de desenvolvimento técnico das comunicações e transmissões de dados via Internet, não garante que os serviços serão prestados de forma ininterrupta, segura e livre de quaisquer erros ou falhas, em face de possível descontinuidade no funcionamento dos equipamentos de informática e da possibilidade dos anúncios pesquisados estarem com informações desatualizadas, devido a responsabilidade de atualização ser dos anunciantes.</p>

<p>O Portal Único Dono, não se responsabiliza por danos e problemas decorrentes da demora, interrupção ou bloqueio nas transmissões de dados ocorridos na Internet.</p>

<p>O usuário que utiliza qualquer informação obtida através dos serviços do Portal é responsável pelo uso da informação obtida.</p>

<h2 style="text-align:justify">Segurança</h2>

<p style="text-align:justify">A senha de acesso aos sistemas de administração dos anúncios é de exclusiva responsabilidade do anunciante (não permita que terceiros tenham acesso à sua senha). O Portal Único Dono cobrará do anunciante os danos ou perdas ocorridas pelo uso negligente do sistema.</p>

<p>Tentativas de invasão ao Portal Único Dono serão tratadas conforme prescrição legal como dano, roubo ou qualquer outra tipificação penal que corresponda às consequências da invasão, previstas no código penal brasileiro.</p>

<h2 style="text-align:justify">Limite de responsabilidade do portal</h2>

<p style="text-align:justify">O Portal Único Dono atua como veiculador de anúncios advindos de diversos anunciantes e, portanto, não atua como prestador de serviços de consultoria ou ainda intermediário ou participante em nenhum negócio entre o USUÁRIO e o(s) ANUNCIANTE(S).</p>

<p>Dessa forma, o Portal Único Dono, não assume responsabilidade por nenhuma consequência que possa advir de qualquer relação entre o USUÁRIO e o(s) ANUNCIANTE(S), seja ela direta ou indireta. Assim, o Portal Único Dono não é responsável por qualquer ação ou omissão do USUÁRIO ou ANUNCIANTE baseada nas informações, anúncios, fotos, vídeos ou outros materiais veiculados no Portal Único Dono . Adicionalmente, o Portal Único Dono envida seus melhores esforços para manter o Portal Único Dono sempre atualizado, preciso e completo, mas não se responsabiliza por imprecisão, erro, fraude, inexatidão ou divergência nos dados, fotos e vídeos ou outros materiais relacionados a anúncios ou à imprecisão das informações aqui contidas.</p>

<p>Por isto, nos casos em que um ou mais USUÁRIOS ou algum terceiro inicie qualquer tipo de reclamação ou ação legal contra um ou mais ANUNCIANTE(S), todos os envolvidos nas reclamações ou ações devem eximir de toda responsabilidade o Portal Único Dono e seus funcionários, agentes, operários, representantes e procuradores.</p>

<p>O Portal Único Dono também não se responsabiliza pelas obrigações tributárias que recaiam nas atividades entre USUÁRIO e ANUNCIANTE(S) do Portal Único Dono. Assim, ao adquirir algum bem, o consumidor deverá exigir nota fiscal do vendedor, a menos que este esteja legalmente dispensado de fornecê-la.</p>

<p>Por meio deste Termo de Uso, o USUÁRIO aceita ser identificado pelo sistema do Portal Único Dono , através, por exemplo, do uso de “cookies” ou outras tecnologias. Tal política visa à melhoria contínua dos serviços prestados pelo Portal Único Dono. Mais informações podem ser obtidas através da Política de Privacidade do Portal Único Dono.</p>

<p>Caso o USUÁRIO acesse o website de parceiros, patrocinadores, ANUNCIANTES e demais websites que sejam acessados através do Portal Único Dono, é possível que haja solicitação de informações financeiras e/ou pessoais suas. Tais informações não estarão sendo enviadas pelo USUÁRIO ao Portal Único Dono, e sim diretamente ao solicitante, não tendo o Portal Único Dono, portanto, qualquer responsabilidade pela utilização e manejo dessa informação.</p>

<h2 style="text-align:justify">Cadastro</h2>

<p style="text-align:justify">O Portal Único Dono oferece a possibilidade do ANUNCIANTE se cadastrar, e neste caso tal ANUNCIANTE pode ter acesso a informações, recursos ou facilidades exclusivas, responsabilizando-se o ANUNCIANTE civil e criminalmente pelas informações e dados fornecidos. O cadastro de anúncios é sujeito à análise.</p>

<p>Não é permitido que um mesmo ANUNCIANTE tenha mais de um cadastro. Se o Portal Único Dono detectar cadastros que aparentemente pertencem à mesma pessoa ou empresa, poderá inabilitar definitivamente todos os cadastros.</p>

<p>O Portal Único Dono se reserva o direito de recusar qualquer solicitação de cadastro e de cancelar um cadastro previamente aceito, a seu exclusivo critério e sem aviso prévio, não cabendo nenhuma indenização ou reparação pelo cancelamento de quaisquer cadastros ou de impossibilidade de cadastro.</p>

<h2 style="text-align:justify">Limitação de Uso</h2>

<p style="text-align:justify">O USUÁRIO não poderá copiar, distribuir, transmitir, exibir, reproduzir, modificar, publicar, licenciar, criar trabalho derivado, colocar e/ou usar em outra página da Internet, transferir ou vender qualquer informação, “software”, lista de USUÁRIO(S) e outras listas, produtos ou serviços obtidos no Portal Único Dono, para uso comercial. Esta proibição expressamente inclui, mas não se limita, à prática de “screen scraping” ou “database scraping” para obter listas de USUÁRIOS ou outras informações para uso comercial ou não.</p>

<p>A título meramente exemplificativo, o USUÁRIO não poderá:</p>

<p>(I) utilizar os produtos e/ou serviços disponíveis no Portal Único Dono para fins diversos daqueles a que se destinam;</p>

<p>(II) enviar ou transmitir quaisquer tipos de informações que induzam, incitem ou resultem em atitudes discriminatórias, mensagens violentas ou delituosas que atentem contra a moral e bons costumes e que contrariam a ordem pública;</p>

<p>(III) utilizar os dados para contato de ANUNCIANTES com outro propósito que não seja o de encaminhar proposta comercial;</p>

<p>(IV) cadastrar-se com informações falsas ou de propriedade de terceiros;</p>

<p>(V) enviar ou transmitir qualquer tipo de informação que seja de propriedade de terceiros;</p>

<p>(VI) alterar, apagar ou corromper dados e informações de terceiros;</p>

<p>(VII) violar a privacidade de outros USUÁRIOS;</p>

<p>(VIII) enviar ou transmitir arquivos com vírus de computador, com conteúdo destrutivo, invasivo ou que causem dano permanente ou temporário aos equipamentos do destinatário e/ou do Portal Único Dono;</p>

<p>(IX) utilizar endereços de computadores, de rede ou de correio eletrônico falsos;</p>

<p>(X) violar propriedade intelectual (direito autoral, marca, patente etc) de terceiros, por meio de qualquer tipo de reprodução de material, sem a prévia autorização do proprietário;</p>

<p>(XI) fazer a distribuição de cópias do Portal Único Dono;</p>

<p>(XII) utilizar de qualquer forma trechos, técnica de engenharia reversa no desenvolvimento ou criação de outros trabalhos a fim de se analisar sua constituição;</p>

<p>(XIII) utilizar apelido que guarde semelhança com o nome “Portal Único Dono”;</p>

<p>(XIV) utilizar qualquer apelido que insinue ou sugira que os produtos ou serviços anunciados pertencem ao Portal Único Dono ou que fazem parte de promoções suas;</p>

<p>(XV) utilizar apelidos considerados ofensivos, bem como os que contenham dados pessoais do USUÁRIO ou alguma URL ou endereço eletrônico.</p>

<p>A inobservância das condições, dos termos e das observações de uso deste SITE ensejará notificação do USUÁRIO, bem como o cancelamento ou suspensão de seu cadastro, temporariamente ou de modo definitivo, sem prejuízo das cominações legais pertinentes.</p>

<h2 style="text-align:justify">Propriedades</h2>

<p style="text-align:justify"><strong>Intelectual, Direitos Autorais e Marcas</strong><br>
Todo o material do Portal Único Dono (a sua apresentação e “layout”, marcas, logotipos, produtos, sistemas, denominações de serviços e outros materiais), incluindo programas, bases de dados, imagens, arquivos ou materiais de qualquer outra espécie e que têm contratualmente autorizadas as suas veiculações neste portal, é protegido pela legislação de Propriedade Intelectual, sendo de titularidade do Portal Único Dono, seus ANUNCIANTES, fornecedores ou clientes. A reprodução, distribuição e transmissão de tais materiais não são permitidas sem o expresso consentimento por escrito do Portal Único Dono ou do respectivo titular, especialmente para fim comercial ou econômico.</p>

<p>O uso indevido de materiais protegidos por propriedade intelectual (direito autoral, marcas comerciais, patentes etc.) apresentados no Portal Único Dono será caracterizado como infração da legislação pertinente, sujeitando o infrator às ações judiciais cabíveis e dando ensejo à respectiva indenização aos prejudicados, seja ao Portal Único Dono, seja a terceiros, sem prejuízo de perdas e danos e honorários advocatícios.</p>

<h2 style="text-align:justify">Cobranças pelos serviços prestados</h2>

<p style="text-align:justify">O Portal Único Dono informa em diversas áreas do website quais são os serviços prestados e cobrados.</p>

<p>Em nenhum caso o Portal Único Dono será responsabilizado por qualquer dano direto, indireto, incidental, especial ou como consequência de interrupção ou descontinuidade de quaisquer dos serviços prestados.</p>

<h2 style="text-align:justify">Riscos tecnológicos</h2>

<p style="text-align:justify">Todos os riscos derivados da utilização do Portal Único Dono são do USUÁRIO ou ANUNCIANTE. Se o seu uso resultar na necessidade de serviços ou reposição de material, propriedade, equipamento ou informação do USUÁRIO ou ANUNCIANTE, o Portal Único Dono, seus administradores, colaboradores, representantes e funcionários não serão responsáveis por tais custos.</p>

<p>As informações, “software”, produtos, valores e serviços publicados neste portal podem conter erros tipográficos ou imprecisões. Alterações e ajustes das informações são realizados periodicamente.</p>

<p>Em nenhum caso o Portal Único Dono será responsabilizado por qualquer dano direto, indireto, incidental, especial ou como consequência de quaisquer fatos resultantes do uso do Portal Único Dono ou da inabilidade de uso deste, ou ainda por quaisquer informações, produtos ou serviços obtidos através dele ou em decorrência do seu uso.</p>

<h2 style="text-align:justify">Links para “Websites” de terceiros</h2>

<p style="text-align:justify">O Portal Único Dono contém “hyperlinks” para outros websites operados por terceiros que não o Portal Único Dono. Esses “hyperlinks” são fornecidos para sua referência apenas. O Portal Único Dono não tem controle sobre esses outros websites, e não se responsabiliza pelo conteúdo dos mesmos. A inclusão desses “hyperlinks” não implica na aprovação do material ou qualquer associação com seus operadores. Ao acessar e usar esses outros websites – incluindo as informações, materiais, produtos e serviços dos mesmos -, o USUÁRIO estará fazendo-o por sua conta e risco.</p>

<p>As mesmas regras se aplicam aos outros websites que contenham “hyperlinks” para o Portal Único Dono, pois o Portal Único Dono também não tem controle sobre estes.</p>

<h2 style="text-align:justify">Alterações dos termos de uso</h2>

<p style="text-align:justify">O Portal Único Dono poderá modificar, alterar e/ou ajustar estes termos a qualquer tempo e essas modificações, alterações e/ou ajustes deverão ser efetivos e imediatos assim que estes se tornem públicos. Para este efeito, o USUÁRIO deverá rever os termos de uso periodicamente, sendo certo que o acesso ou uso contínuo do Portal Único Dono pelo USUÁRIO subordina-se à aceitação dos termos em vigor.</p>

<h2 style="text-align:justify">Indenização</h2>

<p style="text-align:justify">O USUÁRIO ou ANUNCIANTE indenizará o Portal Único Dono, seus administradores, colaboradores, representantes e empregados por qualquer demanda promovida por outros USUÁRIOS, ANUNCIANTES ou terceiros decorrentes de suas atividades ilegais no Portal Único Dono ou por seu descumprimento dos Termos de Uso e demais políticas do Portal Único Dono, ou pela violação de qualquer lei ou direitos de terceiros, sendo de responsabilidade do USUÁRIO ou ANUNCIANTE a reparação por perdas e danos, mais honorários de advogados.</p>

<h2 style="text-align:justify">Foro</h2>

<p style="text-align:justify">Fica eleito o foro da Comarca de São Paulo, Estado de São Paulo, como competente para dirimir quaisquer controvérsias decorrentes deste Termo de Uso independentemente de qualquer outro, por mais privilegiado que seja ou venha a ser.</p>
</div>
</div>
</div></div>
			<div class="h10 clear"></div>
			<div class="redes_sociais addthis_toolbox addthis_default_style ">
							<a class="addthis_button_facebook addthis_button_preferred_1 at300b" title="Facebook" href="#"><span class="at-icon-wrapper" style="background-color: rgb(59, 89, 152); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-2" title="Facebook" alt="Facebook" class="at-icon at-icon-facebook" style="width: 16px; height: 16px;"><title id="at-svg-facebook-2">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span></a>
							<a class="addthis_button_print addthis_button_preferred_3 at300b" title="Imprimir" href="#"><span class="at-icon-wrapper" style="background-color: rgb(115, 138, 141); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-print-3" title="Print" alt="Print" class="at-icon at-icon-print" style="width: 16px; height: 16px;"><title id="at-svg-print-3">Print</title><g><path d="M24.67 10.62h-2.86V7.49H10.82v3.12H7.95c-.5 0-.9.4-.9.9v7.66h3.77v1.31L15 24.66h6.81v-5.44h3.77v-7.7c-.01-.5-.41-.9-.91-.9zM11.88 8.56h8.86v2.06h-8.86V8.56zm10.98 9.18h-1.05v-2.1h-1.06v7.96H16.4c-1.58 0-.82-3.74-.82-3.74s-3.65.89-3.69-.78v-3.43h-1.06v2.06H9.77v-3.58h13.09v3.61zm.75-4.91c-.4 0-.72-.32-.72-.72s.32-.72.72-.72c.4 0 .72.32.72.72s-.32.72-.72.72zm-4.12 2.96h-6.1v1.06h6.1v-1.06zm-6.11 3.15h6.1v-1.06h-6.1v1.06z"></path></g></svg></span></a>
							<a class="addthis_button_twitter addthis_button_preferred_2 at300b" title="Twitter" href="#"><span class="at-icon-wrapper" style="background-color: rgb(29, 161, 242); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-4" title="Twitter" alt="Twitter" class="at-icon at-icon-twitter" style="width: 16px; height: 16px;"><title id="at-svg-twitter-4">Twitter</title><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span></a>
							<a class="addthis_button_google_plusone_share addthis_button_preferred_4 at300b" target="_blank" title="Google+" href="#"><span class="at-icon-wrapper" style="background-color: rgb(220, 78, 65); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-google_plusone_share-5" title="Google+" alt="Google+" class="at-icon at-icon-google_plusone_share" style="width: 16px; height: 16px;"><title id="at-svg-google_plusone_share-5">Google+</title><g><path d="M12 15v2.4h3.97c-.16 1.03-1.2 3.02-3.97 3.02-2.39 0-4.34-1.98-4.34-4.42s1.95-4.42 4.34-4.42c1.36 0 2.27.58 2.79 1.08l1.9-1.83C15.47 9.69 13.89 9 12 9c-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.72-2.84 6.72-6.84 0-.46-.05-.81-.11-1.16H12zm15 0h-2v-2h-2v2h-2v2h2v2h2v-2h2v-2z" fill-rule="evenodd"></path></g></svg></span></a>
							<a class="addthis_button_compact at300m" href="#"><span class="at-icon-wrapper" style="background-color: rgb(255, 101, 80); line-height: 16px; height: 16px; width: 16px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-1" title="More" alt="More" class="at-icon at-icon-addthis" style="width: 16px; height: 16px;"><title id="at-svg-addthis-1">Addthis</title><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span></a>
						<div class="atclear"></div></div>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d7ff3113d47df6d"></script> 			<div class="clear"></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
@endsection
