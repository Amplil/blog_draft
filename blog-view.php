<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ブログビュー</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/solarized-dark.min.css">
    <style>
        h1 {
            background: #dfefff;
            box-shadow: 0px 0px 0px 5px #dfefff;
            border: dashed 1px #96c2fe;
            padding: 0.2em 0.5em;
            color: #454545;
            margin-bottom: 20px;
        }

        h2 {
            background: linear-gradient(transparent 70%, #a7d6ff 70%);
            margin-bottom: 20px;
        }

        h3 {
            color: #010079;
            text-shadow: 0 0 5px white;
            padding: 0.3em 0.5em;
            background: -webkit-repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 3px, #e9f4ff 3px, #e9f4ff 7px);
            background: repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 3px, #e9f4ff 3px, #e9f4ff 7px);
            margin-bottom: 20px;
        }

        pre {
            padding: 20px;
        }
    </style>
</head>

<body>
<!--    
トランスの結合条件は
\begin{cases}
L_1=L_2=L\\
n_1:n_2=1:1\\
K=1 \qquad (結合係数)
\end{cases}
とする。

トランジスタ\(T_r\)の特性
\begin{cases}
h_{FE} &: 直流電流増幅率\\
V_{CE(SAT)} &: {\small \textrm{C-E}} 間飽和電圧\\
V_{BE} &: {\small \textrm{B-E}}間順方向電圧
\end{cases}
-->

<?php
session_start();
$blog_text ='';
if (isset($_SESSION['blog_text'])) {
    $blog_text = $_SESSION['blog_text'];
}
//$blog_text=file_get_contents("blocking-circuit.md");
echo $blog_text;

?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript"
        src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
        MathJax.Hub.Config({
                TeX: { equationNumbers: { autoNumber: "all" } }
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>


</body>
</html>