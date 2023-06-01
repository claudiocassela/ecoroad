<?php
$fo='';
session_start();
if(isset($_SESSION["nom"])){
    if($_SESSION["pri"]=='1'){
        $lo='<li><a href="principal.php" title="CLIQUE AQUI PARA CONTROLAR OS DADOS DOS USUARIOS">Usuários</a></li>
            <li><a href="fauna.php" title="CLIQUE AQUI PARA CONTROLAR OS DADOS DA FAUNA ENCONTRADOS">Fauna</a></li>
        ';
    } else {
        $lo='
        <style>
            #link{
                cursor:pointer;
                }
        </style>
        <li><a href="index.php">Atualizar</a></li>
        <li><a onclick="edi()" id="link">Cadastro</a></li>
        <li><a href="#fauna">Fauna</a></li>
        ';
        $fo='
        <script>
            function edi(){
                document.fedi.submit();
            }
        </script>
        <form name="fedi" method="post" action="principal.php">
        <input type="hidden" name="action" value="editar">
        <input type="hidden" name="code" value="'.$_SESSION["cod"].'">
        </form>
        ';
    }
    
    $sair='
        <li><a href="sair.php">Sair</a></li>
    <li><b style="color:green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bem vindo(a) '.$_SESSION["nom"].'</b></li>';
} else {
    $sair='';
    $lo='<li><a href="principal.php" title="CLIQUE AQUI PARA REALIZAR O LOGIN">Login</a></li><li><a href="principal.php?new=0">Cadastro</a></li>';
}
$body='
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Eco Road</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="ecoroad.png" />
    <script defer src="scripts.js"></script>
</head>

<body>
'.$fo.'
    <header>
        <nav>
            <a href="#" class="logo"><span class="green-text">E</span>co<span>Road</span></a>
            <ul class="menu">
                '.$lo.'
                <li><a href="#about">Sobre</a></li>
                <li><a href="#projects">Projetos</a></li>
                <li><a href="sair.php">Contato</a></li>
                '.$sair.'
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>Grupo <span class="green-text">E</span>co<span class="green-text">Road</span></h1>
            <p><span class="highlighted-text">ESTAMOS CRESCENDO!</span></p>
        </div>
    </section>


    <section id="about" class="about">
        <h2>Sobre nós</h2>
        <p style="text-align:justify;">O Grupo Eco Road tem como
            propósitos, a educação ambiental,
            divulgação científica, defesa da
            vida e o incentivo a um desenvolvimento
            sustentável.<br>
            A iniciativa, que se instaurou em
            2014, foi o de realizar ações
            ambientais, para não só chamar
            atenção da comunidade local à
            importância da natureza, como
            também despertar o interesse e
            conscientizar as pessoas de que,
            com pequenos gestos, juntos
            podemos fazer grandes diferenças.
            Tudo isso ao som do bom e
            velho Rock and Roll!!!<br>
            Em 14 de janeiro de 2018, o Grupo
            se formalizou como Organização
            Não Governamental e se organizou
            em três eixos de atuação:
            Eventos Culturais, Ações Ambientais
            e Eventos Acadêmicos. Desde
            de então, o trabalho cresceu exponencialmente.</p>
    </section>

    <section id="projects" class="projects">
        <h2>Projetos</h2>
        <div class="project">
            <h3>Rock and Roll</h3>
            <p style="text-align:justify;" • 7 Edições do Eco Road Rock Fest;<br>
                • Levar a mensagem ambiental através da música;<br>
                • 3 Edições do Rock pela APAE em prol à entidade;<br>
                • 1 Edição do Old Rockers em prol à Casa de Repouso;<br>
                • Mais de 1 Ton de alimentos arrecadados.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Limpeza rio Guareí</h3>
            <p> • 27 Edições;<br>
                • + de 5 TONELADAS de lixo retirados do rio Guareí;<br>
                • + de 60 Km de rio navegado;<br>
                • 4 ações de limpeza nos córregos urbanos de Angatuba;<br>
                • Participação no programa Mares Limpos da ONU desde 2019.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Projeto Neolontra</h3>
            <p style="text-align:justify;"O “Projeto Neolontra - A Lontra Neotropical em
                Ambientes Alterados pelo Homem”, apoiado pela
                National Geographic Society (#WW-073EE-17),
                procurou promover a divulgação e proteção da lontra
                Neotropical (Lontra longicaudis) e dos ambientes
                aquáticos nos Municípios de Angatuba, Guareí e
                Campina do Monte Alegre, no interior do Estado de
                São Paulo, Brasil.<br>
                Com a ajuda do Gruo Eco Road e através de trabalhos
                de campo, entre 2015 e 2017, foram coletadas
                informações sobre a distribuição regional da lontra
                Neotropical e sobre o conhecimento e a percepção
                dos habitantes locais acerca da espécie na região de
                Angatuba, Guareí e Campina do Monte Alegre. Tratase
                de uma região que conjuga várias práticas
                humanas, como agricultura, pesca e pecuária, com
                importantes ambientes aquáticos.<br>
                O Projeto Neolontra pretendeu: valorizar a informação
                dada pela população sobre a lontra Neotropical;
                incentivar boas práticas para a conservação dos
                ambientes aquáticos, no geral e, da lontra em
                particular; prevenir possíveis situações de conflito
                com a lontra; e completar o censo (distribuição) de
                lontras nessa área. O estudo foi realizado através de
                palestras e ações de sensibilização nas escolas,
                universidades e bairros da região, juntamente com
                materiais de divulgação em prol ao projeto.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Corrida Micológica</h3>
            <p style="text-align:justify;"O que são fungos? Nem planta, nem animal. Fungo!<br>
                Apesar de serem organismos pouco conhecidos, constituem um dos grupos mais
                abundantes e diversos do planeta, desempenhando papéis ecológicos fundamentais para
                os ecossistemas. Os fungos também apresentam importância econômica em diferentes
                áreas, como biotecnologia, medicina, processos industriais e gastronomia (como o
                champignon, o shimeji e o shitake, por exemplo). Na nossa região, os cogumelos são
                abundantes e estão representados por muitas espécies.<br>
                O intuito da “Corrida Micológica”, é divulgar o conhecimento científico, aproximando o
                mundo acadêmico do público leigo, trabalhando o tema “micologia” (estudo de fungos)
                de forma lúdica. Dessa forma, equipes são formadas para explorarem a mata, com o
                objetivo de fotografar esses organismos, sendo que as melhores fotos recebem prêmios
                em diferentes categorias.<br>
                Com essa atividade, espera-se despertar nos participantes uma maior atenção em relação
                aos fungos, incentivando a sua conservação, assim como a dos ecossistemas que
                habitam. O evento é destinado a estudantes, professores, micólogos, amadores e
                amantes da natureza.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Astronomia</h3>
            <p style="text-align:justify;">O Encontro Paulista de Astronomia reúne os maiores clubes de
                astronomia amadora do estado de São Paulo, realizando eventos de
                observação pública com uma grande quantidade de telescópios de
                médio a grande porte. Nesta ocasião ainda, tivemos palestras, minicursos,
                atividades infantis, exposição de astrofotografias e experimentos
                de física. A 4ª Edição do evento, que é itinerante, foi realizada em
                Angatuba-SP, no ano de 2018, com o apoio do Grupo Eco Road. No ano
                seguinte, o Grupo realizou o 1º Encontro de Ecoastromia, focando na
                relação dos astros com o meio ambiente.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Paleontologia</h3>
            <p style="text-align:justify;"Do grego "palaiós" (antigo) + "ontós" (ser) +
                "lógos" (estudo ou ciência): Estudo dos seres
                antigos - ciência que estuda a vida do
                passado na Terra.<br>
                •Desenvolvimento.<br>
                •Processos da integração da formação
                biológica no registro geológico.<br>
                O Grupo Eco Road teve a oportunidade de
                mostrar seu trabalho em vários eventos
                acadêmicos, com destaque para o XXV e o
                XXVI Congresso Brasileiro de Paleontologia
                em Ribeirão Preto SP e Uberlândia MG,
                respectivamente. E por falar em
                paleontologia, estamos à frente do Projeto
                Mesossauros, trabalho este que já levou o
                nome de Angatuba nos últimos 3 Congressos
                Paulistas sobre o tema (PALEOSP).<br>
                O I Encontro Aberto de Paleontologia de
                Angatuba (EAPA), buscou uma mobilização social
                que envolveu várias entidades da sociedade civil,
                meio acadêmico, entidades públicas, dentre
                outras, para a elaboração conjunta e democrática
                de um Plano de Ação de implementação de um
                Geoparque em Angatuba certificado pela UNESCO
                (Organização das Nações Unidas para a Educação,
                a Ciência e a Cultura).<br>
                A importância da paleontologia e geologia do
                município de Angatuba, merece um
                reconhecimento internacional, ao qual o
                envolvimento da pesquisa, ciência e turismo
                formam um conjunto de áreas que estimulam o
                desenvolvimento socioeconômico e sociocultural
                do município. O evento (I EAPA) abordou a
                importância dos geossítios presentes em
                Angatuba, além de buscar envolvimento da
                população em geral com a proposta.<br>
                O evento contou com a participação de
                representantes do Arouca Geopark de Portugal, do
                Geoparque do Araripe do nordeste brasileiro, de
                avaliadores da UNESCO e foi patrocinado pela
                Klabin S.A.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Fórum Ambiental</h3>
            <p style="text-align:justify;"O Fórum Ambiental de Angatuba, idealizado pelo
                Grupo Eco Road, foi criado com o intuito de
                possibilitar um espaço de discussões e veiculação
                de informações acerca do Meio Ambiente. O
                Fórum é gratuito para toda a comunidade e região
                e conta com palestrantes voluntários para as
                apresentações dos temas. Em todos os anos,
                sugestões para a solução de problemas
                ambientais comunitários são reunidas, a fim de
                buscar solução para os mesmos e, quando
                necessário, direcioná-las ao Poder Público
                Municipal, Estadual e Federal, para os devidos
                encaminhamentos e providências.<br>
                A cada edição do Fórum, o qual é realizado na
                semana do dia 05 de junho em comemoração ao
                Dia Mundial do Meio Ambiente, é definido um
                tema diferente a ser tratado por palestrantes
                convidados e por populares, que também
                participam do evento.</p>
        </div>
    </section>

    <section id="projects" class="projects">
        <div class="project">
            <h3>Planos da Mata</h3>
            <p style="text-align:justify;"A Fundação SOS Mata Atlântica juntamente com a gigante Suzano Papel e Celulose,
                são parceiras no projeto “Planos da Mata”, iniciativa que visa fortalecer a governança
                dos municípios para a proteção e uso sustentável da Mata Atlântica, aliando
                desenvolvimento econômico e social, por meio da elaboração dos Planos Municipais da
                Mata Atlântica - PMMA.<br>
                O projeto abrange 33 municípios nos estados do Espírito Santo, Bahia, Minas Gerais e
                São Paulo, nos quais a Suzano tem operações fabris, florestais e ações voltadas à
                sustentabilidade. Para tanto, a equipe da SOS Mata Atlântica, investiu em parcerias com
                organizações não governamentais (ONGs) locais/regionais e Prefeituras, no âmbito de
                seus Conselhos Municipais de Meio Ambiente, para construção participativa e posterior
                monitoramento da implementação do instrumento do PMMA. Isso se deu com o apoio
                de uma plataforma técnica de monitoramento e avaliação para melhoria e atualização
                contínuas de suas metas.<br>
                O Grupo Eco Road trabalha junto ao Instituto Cílios da Terra, vencedor do edital, na
                construção do Plano Municipal de Proteção da Mata Atlântica e Cerrado do município
                de Angatuba-SP.</p>
        </div>
    </section>

    <section id="fauna" class="projects">
        <div class="project">
            <h3>Lista de espécies avistadas no entorno EEcA</h3>
            <table width="70%" border="1">';
            include "conexao.php";
            $sql=mysqli_query($conn,"select * from tb_fauna order by caso desc,nome asc");
            $body.='<tr><th align="left">Nome popular</th><th>Número de casos</th><th>Porcentagem de casos</th></tr>';
            while($l=mysqli_fetch_array($sql)){
                $body.='<tr><td>'.$l["nome"].'</td><td align="center">'.$l["caso"].'</td><td align="center">'.$l["perc"].'%</td><tr>';
            }
        $body.='</table></div>
    </section>

    <section id="contact" class="contact">
        <h2>Contato</h2>
        <p>Informações de contato</p>
    </section>

    <footer>
        <p>&copy; Grupo Eco Road. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
';
echo $body;
?>