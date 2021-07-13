let editor_area=document.getElementById('editor_area');
let preview=document.getElementById('preview');
let previous_html="";
let load_num=0;
let plain_text=localStorage.getItem('plain_text');
//console.log(plain_text);
$('#editor_area').val(plain_text);
preview_disp();

$(function () {
    let event_flag=0;
    marked.setOptions({
        // code要素にdefaultで付くlangage-を削除
        langPrefix: '',
        // highlightjsを使用したハイライト処理を追加
        highlight: function (code, lang) {
            return hljs.highlightAuto(code, [lang]).value
        }
    });
    $('#editor_area').keyup(function () {
        //let html = marked($(this).val());
        if( event_flag===0){
            event_flag=1;
            window.setTimeout(function(){
                event_flag=0;
                preview_disp();
            }, 1000);
        }
    });
    /*
    $(window).keydown(function(e){
        if(event.shiftKey){
            if(e.keyCode === 13){
                $.post({
                    url: 'price_comparison_ajax.php',
                    data:{"blog-text": html},
                    dataType: 'json' //必須。json形式で返すように設定
                }).done(function(data){
            }
        }
    });
    */
    // スクロールしたとき
    editor_area.onscroll = function () {
        scroll_follow_up();
    };
});

// スクロールしたときにスクロール位置を合わせる
function scroll_follow_up(){
    let editorTop=editor_area.scrollTop; // editorのスクロールした位置の上部座標
    let editorWindow=editor_area.clientHeight; // editorのウィンドウ（表示される枠）の高さ
    let editorHeight=editor_area.scrollHeight; // editorの全体の高さ
    //let previewTop=preview.contentWindow.pageYOffset; // iframeの場合のスクロールした位置の上部座標
    let previewWindow=preview.contentWindow.innerHeight; // iframeのウィンドウ（表示される枠）の高さ
    let previewHeight=preview.contentDocument.documentElement.scrollHeight; // iframeの全体の高さ
    //console.log('editorのスクロールした位置の上部座標',editorTop);
    //console.log('editorの全体の高さ',editorHeight);
    //console.log('editorのウィンドウ（表示される枠）の高さ',editorWindow);
    //console.log('iframeのスクロールした位置の上部座標',previewTop);
    //console.log('iframeの全体の高さ',previewHeight);
    //console.log('iframeのウィンドウ（表示される枠）の高さ',previewWindow);
    preview.contentWindow.scrollTo(0,previewHeight*(editorTop+editorWindow)/editorHeight-previewWindow); // 何％の高さのところにeditorのスクロールした位置がきているか
}

// マークダウンをプレビュー画面に表示する
function preview_disp(){
    plain_text=$('#editor_area').val();
    let html = marked(plain_text);
    if(previous_html!=html){
        previous_html=html;
        load_num++;
        console.log("load_num:",load_num);
        localStorage.setItem('plain_text', plain_text);
        $.post({
            url: 'blog-text-save.php',
            data:{"blog_text": html},
            dataType: 'json' //必須。json形式で返すように設定
        }).done(function(data){
            document.getElementById("preview").contentWindow.location.reload();
            window.setTimeout(function(){
                scroll_follow_up(); // スクロールを合わせる
            }, 1000);
        }).fail(function(XMLHttpRequest, textStatus, errorThrown){
            alert(errorThrown);
        })
    }
}