<?php
use Database\MySQLWrapper;

// URLクエリパラメータを通じてIDが提供されたかどうかをチェックします。
$id = $_GET['id'] ?? null;
if (!$id) {
    die("No ID provided for part lookup.");
}

// データベース接続を初期化します。
$db = new MySQLWrapper();

try {
    // IDでスニペットを取得するステートメントを準備します。
    $stmt = $db->prepare("SELECT * FROM computer_parts WHERE id = ?");
    // i' は整数であることを示します。
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $part = $result->fetch_assoc();
} catch (Exception $e) {
    die("Error fetching part by ID: " . $e->getMessage());
}

if (!$part) {
    print("No part found with ID: $id");
    exit;
}

?>
<div id="editor" style="width: 100%; height: 80vh; border: 1px solid slategray; position:relative">
    <div id="placeholder" style="position: absolute; top:0; left:0; z-index:1; color:slategray">ここにコードを書いてください</div>
</div>
<form id="editorForm" action="register" method="post">
    <input type="hidden" id="code" name="code" />
    <label for="syntax">Code:</label>
    <select id="syntax" name="syntax">
    <option value="html">HTML</option>
    <option value="css">CSS</option>
    <option value="javascript">Ja\vaScript</option>
    <option value="json">JSON</option>
    <option value="typescript">TypeScript</option>
    <option value="python">Python</option>
    <option value="java">Java</option>
    <option value="csharp">C#</option>
    <option value="cpp">C++</option>
    <option value="php">PHP</option>
    <option value="ruby">Ruby</option>
    <option value="go">Go</option>
    <option value="markdown">Markdown</option>
    <option value="sql">SQL</option>
    <option value="xml">XML</option>
    <option value="yaml">YAML</option>
    </select>
    <label for="expire">Expire Date:</label>
    <select id="expire" name="expire">
        <option value="tenMin">10 min</option>
        <option value="oneHour">1 hour</option>
        <option value="oneDay">1 day</option>
        <option value="never">never</option>

    </select>
</form>



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
        editor = monaco.editor.create(document.getElementById("editor"), {
            value: "",
            language: "markdown",
            readOnly: true
        });

    });
   
</script>