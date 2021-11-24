<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

include("../model/conexao.php");

//select -> buscar informações para alimentar o grafico
try {
    $stmt = $conexao->prepare("SELECT cd_situacao, count(*) AS qtd FROM tb_aluno_notas 
    GROUP BY cd_situacao;");
    if ($stmt->execute()) {
        $i = 0;
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            $cd_situacao[]=$rs->cd_situacao;
            $qtd[]=$rs->qtd;
            $i++;
        }
    } else {
echo "Erro: Não foi possível recuperar os dados do banco de dados";
    }
} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}

$data = array(40,60,21,33,12,33);

$graph = new PieGraph(300,300);
$graph->clearTheme();
$graph->SetShadow();

$graph->title->Set("Relacao aprovados e reprovados");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$p1 = new PiePlot($qtd);
$p1->SetLegends($cd_situacao);
$p1->SetTheme("sand");
$p1->SetCenter(0.5,0.55);
$p1->value->Show(false);
$graph->Add($p1);
$graph->Stroke();

?>
