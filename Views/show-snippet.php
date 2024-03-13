<?php
use Database\MySQLWrapper;



// URLクエリパラメータを通じてIDが提供されたかどうかをチェックします。
$uid = $_GET['uid'] ?? null;
if ($uid ){
    
    // データベース接続を初期化します。
    $db = new MySQLWrapper();
    
    try {
        // IDでスニペットを取得するステートメントを準備します。
        $stmt = $db->prepare("SELECT * FROM snippets WHERE uid = ?");
        $stmt->bind_param('s', $uid);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $snippet = $result->fetch_assoc();
        if (!$snippet){
            throw new Exception("this snippet does not exist");
        }

    } catch (Exception $e) {
        die("Error fetching snippet by uid: " . $e->getMessage());
    }
}else{
    die("uid is necessary." );

}


?>
<div id="" style="display: flex;  flex-direction: column;">



<div>id: <?= htmlspecialchars($snippet['uid']) ?></div>

    <div>title: <?= htmlspecialchars($snippet['title']) ?></div>
    <div >syntax: <?= htmlspecialchars($snippet['syntax']) ?></div>
    <div>expire: <?= $snippet['expire_datetime'] ? htmlspecialchars($snippet['expire_datetime']) : "never" ?></div>

    <div id="syntax" style="display: none;"><?= htmlspecialchars($snippet['syntax']) ?></div>
    <div id="text" name="text" style="display: none;"><?= htmlspecialchars($snippet['text']) ?></div>
</div>


<div id="editor" style="width: 100%; height: 80vh; border: 1px solid slategray; position:relative">
</div>




<!-- Monaco Editorのスクリプトを読み込む -->
<script src="https://cdn.jsdelivr.net/npm/marked@3.0.7/marked.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script>



    let editor;
    require.config({
        paths: {
            vs: "https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs",
        },
    });
    require(["vs/editor/editor.main"], function() {
                    // id="text" の要素からテキストを取得
                    let textContent = document.getElementById("text").innerText;
console.log("textContent",textContent);

                    let syntax = document.getElementById("syntax").innerText;
console.log("syntax",syntax);
        editor = monaco.editor.create(document.getElementById("editor"), {
            value: textContent,
            language: syntax,
            readOnly: true
        });

    });
   
</script>