<html>
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
      <title>Cashier</title>
      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/jquery.qrcode.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="js/jquery.selectBoxIt.min.js"></script>
      <script src="js/clipboard.min.js" type="text/javascript"></script>
      <script src="js/callapp.min.js" type="text/javascript"></script>
      <script type="text/javascript">
         function getQueryVariable(variable){
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i=0;i<vars.length;i++) {
                        var pair = vars[i].split("=");
                        if(pair[0] == variable){return pair[1];}
                }
                return "";
                //#ff9eaa
         }
      </script>
      <style type="text/css">
         body {
         font-size: 15px;
         font-family: Montserrat, sans-serif;
         background-image: linear-gradient(to bottom right, #1baff3 0% 65%, #1baff3 99% 100%);/* #e860ff */
         background-position: center;
         background-attachment: fixed;
         margin: 0;
         box-sizing: border-box;
         place-items: center;
         }
         button{
         border-radius: 5px;
         border: 0px;
         padding:7px 10px 7px 10px;
         background-color: #1baff3;
         color: white;
         }
         .appdiv{
         border-radius: 10px;
         border: 1px solid #1baff3;
         width: 50px;
         height: 50px;
         text-align: center;
         display: flex;
         justify-content: center;
         align-items: center;
         }
         input:focus{
         outline:none;  
         box-shadow:0 0 0 1.5px #f7941d;
         }
         select:focus{
         outline:none;  
         box-shadow:0 0 0 1.5px #f7941d;
         }
         .copy_tip {
         width: 2.5rem !important;
         height: 2.5rem !important;
         right: 1.7rem;
         top: 5.7rem;
         position: absolute;
         -webkit-animation: scaleDraw 3s ease-in-out infinite;
         }
         @keyframes scaleDraw { 
         0%{
         transform: scale(1);
         }
         25%{
         transform:scale(1.2);
         }
         50%{
         transform:scale(1);
         }
         75%{
         transform:scale(1.2);
         }
         }
         .form-control {
         display: block;
         width: 100%;
         padding: 0.375rem 0.75rem;
         font-size: 1rem;
         font-weight: 400;
         line-height: 1.5;
         color: #212529;
         background-color: #fff;
         background-clip: padding-box;
         border: 2px solid #ced4da;
         -webkit-appearance: none;
         -moz-appearance: none;
         appearance: none;
         border-radius: 0.375rem;
         }
      </style>
      <style type="text/css">.eruda-search-highlight-block{display:inline}.eruda-search-highlight-block .eruda-keyword{background:#332a00;color:#ffcb6b}</style>
      <style type="text/css">@font-face{font-family:eruda-icon; format('woff')}[class*=' eruda-icon-'],[class^='eruda-icon-']{display:inline-block;font-family:eruda-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.eruda-icon-arrow-left:before{content:'\f101'}.eruda-icon-arrow-right:before{content:'\f102'}.eruda-icon-caret-down:before{content:'\f103'}.eruda-icon-caret-right:before{content:'\f104'}.eruda-icon-clear:before{content:'\f105'}.eruda-icon-compress:before{content:'\f106'}.eruda-icon-copy:before{content:'\f107'}.eruda-icon-delete:before{content:'\f108'}.eruda-icon-error:before{content:'\f109'}.eruda-icon-expand:before{content:'\f10a'}.eruda-icon-eye:before{content:'\f10b'}.eruda-icon-filter:before{content:'\f10c'}.eruda-icon-play:before{content:'\f10d'}.eruda-icon-record:before{content:'\f10e'}.eruda-icon-refresh:before{content:'\f10f'}.eruda-icon-reset:before{content:'\f110'}.eruda-icon-search:before{content:'\f111'}.eruda-icon-select:before{content:'\f112'}.eruda-icon-tool:before{content:'\f113'}.eruda-icon-warn:before{content:'\f114'}@font-face{font-family:luna-console-icon; format('woff')}[class*=' luna-console-icon-'],[class^=luna-console-icon-]{display:inline-block;font-family:luna-console-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.luna-console-icon-error:before{content:'\f101'}.luna-console-icon-input:before{content:'\f102'}.luna-console-icon-output:before{content:'\f103'}.luna-console-icon-warn:before{content:'\f104'}.luna-console-icon-caret-down:before{content:'\f105'}.luna-console-icon-caret-right:before{content:'\f106'}.luna-console{background:#fff;overflow-y:auto;-webkit-overflow-scrolling:touch;height:100%;position:relative;will-change:scroll-position;cursor:default;font-size:12px;font-family:ui-monospace,SFMono-Regular,SF Mono,Menlo,Consolas,Liberation Mono,monospace}.luna-console.luna-console-theme-dark{background-color:#242424}.luna-console-hidden{display:none}.luna-console-fake-logs{position:absolute;left:0;top:0;pointer-events:none;visibility:hidden;width:100%}.luna-console-logs{padding-top:1px;position:absolute;width:100%}.luna-console-log-container{box-sizing:content-box}.luna-console-log-container.luna-console-selected .luna-console-log-item{background:#ecf1f8}.luna-console-log-container.luna-console-selected .luna-console-log-item:not(.luna-console-error):not(.luna-console-warn){border-color:#ccdef5}.luna-console-header{white-space:nowrap;display:flex;font-size:11px;color:#545454;border-top:1px solid transparent;border-bottom:1px solid #ccc}.luna-console-header .luna-console-time-from-container{overflow-x:auto;-webkit-overflow-scrolling:touch;padding:3px 10px}.luna-console-nesting-level{width:14px;flex-shrink:0;margin-top:-1px;margin-bottom:-1px;position:relative;border-right:1px solid #ccc}.luna-console-nesting-level.luna-console-group-closed::before{content:''}.luna-console-nesting-level::before{border-bottom:1px solid #ccc;position:absolute;top:0;left:0;margin-left:100%;width:5px;height:100%;box-sizing:border-box}.luna-console-log-item{position:relative;display:flex;border-top:1px solid transparent;border-bottom:1px solid #ccc;margin-top:-1px;color:#333}.luna-console-log-item:after{content:'';display:block;clear:both}.luna-console-log-item .luna-console-code{display:inline;font-family:ui-monospace,SFMono-Regular,SF Mono,Menlo,Consolas,Liberation Mono,monospace}.luna-console-log-item .luna-console-code .luna-console-keyword{color:#881280}.luna-console-log-item .luna-console-code .luna-console-number{color:#1c00cf}.luna-console-log-item .luna-console-code .luna-console-operator{color:grey}.luna-console-log-item .luna-console-code .luna-console-comment{color:#236e25}.luna-console-log-item .luna-console-code .luna-console-string{color:#1a1aa6}.luna-console-log-item a{color:#15c!important}.luna-console-log-item .luna-console-icon-container{margin:0 -6px 0 10px}.luna-console-log-item .luna-console-icon-container .luna-console-icon{line-height:20px;font-size:12px;color:#333;position:relative}.luna-console-log-item .luna-console-icon-container .luna-console-icon-caret-down,.luna-console-log-item .luna-console-icon-container .luna-console-icon-caret-right{top:0;left:-2px}.luna-console-log-item .luna-console-icon-container .luna-console-icon-error{top:0;color:#ef3842}.luna-console-log-item .luna-console-icon-container .luna-console-icon-warn{top:0;color:#e8a400}.luna-console-log-item .luna-console-count{background:#8097bd;color:#fff;padding:2px 4px;border-radius:10px;font-size:12px;float:left;margin:1px -6px 0 10px}.luna-console-log-item .luna-console-log-content-wrapper{flex:1;overflow:hidden}.luna-console-log-item .luna-console-log-content{padding:3px 0;margin:0 10px;overflow-x:auto;-webkit-overflow-scrolling:touch;white-space:pre-wrap;-webkit-user-select:text;user-select:text}.luna-console-log-item .luna-console-log-content {-webkit-user-select:text;user-select:text}.luna-console-log-item .luna-console-log-content>{vertical-align:top}.luna-console-log-item .luna-console-log-content .luna-console-null,.luna-console-log-item .luna-console-log-content .luna-console-undefined{color:#5e5e5e}.luna-console-log-item .luna-console-log-content .luna-console-number{color:#1c00cf}.luna-console-log-item .luna-console-log-content .luna-console-boolean{color:#0d22aa}.luna-console-log-item .luna-console-log-content .luna-console-regexp,.luna-console-log-item .luna-console-log-content .luna-console-symbol{color:#881391}.luna-console-log-item .luna-console-data-grid,.luna-console-log-item .luna-console-dom-viewer{white-space:initial}.luna-console-log-item.luna-console-error{z-index:50;background:#fff0f0;color:red;border-top:1px solid #ffd6d6;border-bottom:1px solid #ffd6d6}.luna-console-log-item.luna-console-error .luna-console-stack{padding-left:1.2em;white-space:nowrap}.luna-console-log-item.luna-console-error .luna-console-count{background:red}.luna-console-log-item.luna-console-debug{z-index:20}.luna-console-log-item.luna-console-input{border-bottom-color:transparent}.luna-console-log-item.luna-console-warn{z-index:40;color:#5c5c00;background:#fffbe5;border-top:1px solid #fff5c2;border-bottom:1px solid #fff5c2}.luna-console-log-item.luna-console-warn .luna-console-count{background:#e8a400}.luna-console-log-item.luna-console-info{z-index:30}.luna-console-log-item.luna-console-group,.luna-console-log-item.luna-console-groupCollapsed{font-weight:700}.luna-console-preview{display:inline-block}.luna-console-preview .luna-console-preview-container{display:flex;align-items:center}.luna-console-preview .luna-console-json{overflow-x:auto;-webkit-overflow-scrolling:touch;padding-left:12px}.luna-console-preview .luna-console-preview-icon-container{display:block}.luna-console-preview .luna-console-preview-icon-container .luna-console-icon{position:relative;font-size:12px}.luna-console-preview .luna-console-preview-icon-container .luna-console-icon-caret-down{top:2px}.luna-console-preview .luna-console-preview-icon-container .luna-console-icon-caret-right{top:1px}.luna-console-preview .luna-console-preview-content-container{word-break:break-all}.luna-console-preview .luna-console-descriptor,.luna-console-preview .luna-console-object-preview{font-style:italic}.luna-console-preview .luna-console-key{color:#881391}.luna-console-preview .luna-console-number{color:#1c00cf}.luna-console-preview .luna-console-null{color:#5e5e5e}.luna-console-preview .luna-console-string{color:#c41a16}.luna-console-preview .luna-console-boolean{color:#0d22aa}.luna-console-preview .luna-console-special{color:#5e5e5e}.luna-console-theme-dark{color-scheme:dark}.luna-console-theme-dark .luna-console-log-container.luna-console-selected .luna-console-log-item{background:#29323d}.luna-console-theme-dark .luna-console-log-container.luna-console-selected .luna-console-log-item:not(.luna-console-error):not(.luna-console-warn){border-color:#4173b4}.luna-console-theme-dark .luna-console-log-item{color:#a5a5a5;border-bottom-color:#3d3d3d}.luna-console-theme-dark .luna-console-log-item .luna-console-code .luna-console-keyword{color:#e36eec}.luna-console-theme-dark .luna-console-log-item .luna-console-code .luna-console-number{color:#9980ff}.luna-console-theme-dark .luna-console-log-item .luna-console-code .luna-console-operator{color:#7f7f7f}.luna-console-theme-dark .luna-console-log-item .luna-console-code .luna-console-comment{color:#747474}.luna-console-theme-dark .luna-console-log-item .luna-console-code .luna-console-string{color:#f29766}.luna-console-theme-dark .luna-console-log-item.luna-console-error{background:#290000;color:#ff8080;border-top-color:#5c0000;border-bottom-color:#5c0000}.luna-console-theme-dark .luna-console-log-item.luna-console-error .luna-console-count{background:#ff8080}.luna-console-theme-dark .luna-console-log-item.luna-console-warn{color:#ffcb6b;background:#332a00;border-top-color:#650;border-bottom-color:#650}.luna-console-theme-dark .luna-console-log-item .luna-console-count{background:#42597f;color:#949494}.luna-console-theme-dark .luna-console-log-item .luna-console-log-content .luna-console-null,.luna-console-theme-dark .luna-console-log-item .luna-console-log-content .luna-console-undefined{color:#7f7f7f}.luna-console-theme-dark .luna-console-log-item .luna-console-log-content .luna-console-boolean,.luna-console-theme-dark .luna-console-log-item .luna-console-log-content .luna-console-number{color:#9980ff}.luna-console-theme-dark .luna-console-log-item .luna-console-log-content .luna-console-regexp,.luna-console-theme-dark .luna-console-log-item .luna-console-log-content .luna-console-symbol{color:#e36eec}.luna-console-theme-dark .luna-console-icon-container .luna-console-icon-caret-down,.luna-console-theme-dark .luna-console-icon-container .luna-console-icon-caret-right{color:#9aa0a6}.luna-console-theme-dark .luna-console-header{border-bottom-color:#3d3d3d}.luna-console-theme-dark .luna-console-nesting-level{border-right-color:#3d3d3d}.luna-console-theme-dark .luna-console-nesting-level::before{border-bottom-color:#3d3d3d}.luna-console-theme-dark .luna-console-preview .luna-console-key{color:#e36eec}.luna-console-theme-dark .luna-console-preview .luna-console-number{color:#9980ff}.luna-console-theme-dark .luna-console-preview .luna-console-null{color:#7f7f7f}.luna-console-theme-dark .luna-console-preview .luna-console-string{color:#f29766}.luna-console-theme-dark .luna-console-preview .luna-console-boolean{color:#9980ff}.luna-console-theme-dark .luna-console-preview .luna-console-special{color:#7f7f7f}@font-face{font-family:luna-object-viewer-icon; format('woff')}[class*=' luna-object-viewer-icon-'],[class^=luna-object-viewer-icon-]{display:inline-block;font-family:luna-object-viewer-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.luna-object-viewer-icon-caret-down:before{content:'\f101'}.luna-object-viewer-icon-caret-right:before{content:'\f102'}.luna-object-viewer{overflow-x:auto;-webkit-overflow-scrolling:touch;overflow-y:hidden;cursor:default;font-family:ui-monospace,SFMono-Regular,SF Mono,Menlo,Consolas,Liberation Mono,monospace;font-size:12px;line-height:1.2;min-height:100%;color:#333;list-style:none!important}.luna-object-viewer ul{list-style:none!important;padding:0!important;padding-left:12px!important;margin:0!important}.luna-object-viewer li{position:relative;white-space:nowrap;line-height:16px;min-height:16px}.luna-object-viewer>li>.luna-object-viewer-key{display:none}.luna-object-viewer span{position:static!important}.luna-object-viewer li .luna-object-viewer-collapsed~.luna-object-viewer-close:before{color:#999}.luna-object-viewer-array .luna-object-viewer-object .luna-object-viewer-key{display:inline}.luna-object-viewer-null{color:#5e5e5e}.luna-object-viewer-regexp,.luna-object-viewer-string{color:#c41a16}.luna-object-viewer-number{color:#1c00cf}.luna-object-viewer-boolean{color:#0d22aa}.luna-object-viewer-special{color:#5e5e5e}.luna-object-viewer-key,.luna-object-viewer-key-lighter{color:#881391}.luna-object-viewer-key-lighter{opacity:.6}.luna-object-viewer-key-special{color:#5e5e5e}.luna-object-viewer-collapsed .luna-object-viewer-icon,.luna-object-viewer-expanded .luna-object-viewer-icon{position:absolute!important;left:-12px;color:#727272;font-size:12px}.luna-object-viewer-icon-caret-right{top:0}.luna-object-viewer-icon-caret-down{top:1px}.luna-object-viewer-expanded>.luna-object-viewer-icon-caret-down{display:inline}.luna-object-viewer-expanded>.luna-object-viewer-icon-caret-right{display:none}.luna-object-viewer-collapsed>.luna-object-viewer-icon-caret-down{display:none}.luna-object-viewer-collapsed>.luna-object-viewer-icon-caret-right{display:inline}.luna-object-viewer-hidden~ul{display:none}.luna-object-viewer-theme-dark{color:#fff}.luna-object-viewer-theme-dark .luna-object-viewer-null,.luna-object-viewer-theme-dark .luna-object-viewer-special{color:#a1a1a1}.luna-object-viewer-theme-dark .luna-object-viewer-regexp,.luna-object-viewer-theme-dark .luna-object-viewer-string{color:#f28b54}.luna-object-viewer-theme-dark .luna-object-viewer-boolean,.luna-object-viewer-theme-dark .luna-object-viewer-number{color:#9980ff}.luna-object-viewer-theme-dark .luna-object-viewer-key,.luna-object-viewer-theme-dark .luna-object-viewer-key-lighter{color:#5db0d7}@font-face{font-family:luna-dom-viewer-icon;format('woff')}[class*=' luna-dom-viewer-icon-'],[class^=luna-dom-viewer-icon-]{display:inline-block;font-family:luna-dom-viewer-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.luna-dom-viewer-icon-arrow-down:before{content:'\f101'}.luna-dom-viewer-icon-arrow-right:before{content:'\f102'}.luna-dom-viewer{color:#333;background-color:#fff;font-family:Arial,Helvetica,sans-serif;box-sizing:border-box;-webkit-user-select:none;user-select:none;font-size:14px;overflow-y:auto;-webkit-overflow-scrolling:touch;background:0 0;overflow-x:hidden;word-wrap:break-word;padding:0 0 0 12px;font-size:12px;font-family:ui-monospace,SFMono-Regular,SF Mono,Menlo,Consolas,Liberation Mono,monospace;cursor:default;list-style:none}.luna-dom-viewer.luna-dom-viewer-platform-windows{font-family:'Segoe UI',Tahoma,sans-serif}.luna-dom-viewer.luna-dom-viewer-platform-linux{font-family:Roboto,Ubuntu,Arial,sans-serif}.luna-dom-viewer .luna-dom-viewer-hidden,.luna-dom-viewer.luna-dom-viewer-hidden{display:none}.luna-dom-viewer .luna-dom-viewer-invisible,.luna-dom-viewer.luna-dom-viewer-invisible{visibility:hidden}.luna-dom-viewer {box-sizing:border-box}.luna-dom-viewer ul{list-style:none}.luna-dom-viewer.luna-dom-viewer-theme-dark{color:#e8eaed}.luna-dom-viewer-toggle{min-width:12px;margin-left:-12px}.luna-dom-viewer-icon-arrow-down,.luna-dom-viewer-icon-arrow-right{position:absolute!important;font-size:12px!important}.luna-dom-viewer-tree-item{line-height:16px;min-height:16px;position:relative;z-index:10;outline:0}.luna-dom-viewer-tree-item.luna-dom-viewer-selected .luna-dom-viewer-selection,.luna-dom-viewer-tree-item:hover .luna-dom-viewer-selection{display:block}.luna-dom-viewer-tree-item:hover .luna-dom-viewer-selection{background:#f2f7fd}.luna-dom-viewer-tree-item.luna-dom-viewer-selected .luna-dom-viewer-selection{background:#e0e0e0}.luna-dom-viewer-tree-item.luna-dom-viewer-selected:focus .luna-dom-viewer-selection{background:#cfe8fc}.luna-dom-viewer-tree-item .luna-dom-viewer-icon-arrow-down{display:none}.luna-dom-viewer-tree-item.luna-dom-viewer-expanded .luna-dom-viewer-icon-arrow-down{display:inline-block}.luna-dom-viewer-tree-item.luna-dom-viewer-expanded .luna-dom-viewer-icon-arrow-right{display:none}.luna-dom-viewer-html-tag{color:#881280}.luna-dom-viewer-tag-name{color:#881280}.luna-dom-viewer-attribute-name{color:#994500}.luna-dom-viewer-attribute-value{color:#1a1aa6}.luna-dom-viewer-attribute-value.luna-dom-viewer-attribute-underline{text-decoration:underline}.luna-dom-viewer-html-comment{color:#236e25}.luna-dom-viewer-selection{position:absolute;display:none;left:-10000px;right:-10000px;top:0;bottom:0;z-index:-1}.luna-dom-viewer-children{margin:0;overflow-x:visible;overflow-y:visible;padding-left:15px}.luna-dom-viewer-text-node .luna-dom-viewer-keyword{color:#881280}.luna-dom-viewer-text-node .luna-dom-viewer-number{color:#1c00cf}.luna-dom-viewer-text-node .luna-dom-viewer-operator{color:grey}.luna-dom-viewer-text-node .luna-dom-viewer-comment{color:#236e25}.luna-dom-viewer-text-node .luna-dom-viewer-string{color:#1a1aa6}.luna-dom-viewer-theme-dark .luna-dom-viewer-icon-arrow-down,.luna-dom-viewer-theme-dark .luna-dom-viewer-icon-arrow-right{color:#9aa0a6}.luna-dom-viewer-theme-dark .luna-dom-viewer-html-tag,.luna-dom-viewer-theme-dark .luna-dom-viewer-tag-name{color:#5db0d7}.luna-dom-viewer-theme-dark .luna-dom-viewer-attribute-name{color:#9bbbdc}.luna-dom-viewer-theme-dark .luna-dom-viewer-attribute-value{color:#f29766}.luna-dom-viewer-theme-dark .luna-dom-viewer-html-comment{color:#898989}.luna-dom-viewer-theme-dark .luna-dom-viewer-tree-item:hover .luna-dom-viewer-selection{background:#083c69}.luna-dom-viewer-theme-dark .luna-dom-viewer-tree-item.luna-dom-viewer-selected .luna-dom-viewer-selection{background:#454545}.luna-dom-viewer-theme-dark .luna-dom-viewer-tree-item.luna-dom-viewer-selected:focus .luna-dom-viewer-selection{background:#073d69}.luna-dom-viewer-theme-dark .luna-dom-viewer-text-node .luna-dom-viewer-keyword{color:#e36eec}.luna-dom-viewer-theme-dark .luna-dom-viewer-text-node .luna-dom-viewer-number{color:#9980ff}.luna-dom-viewer-theme-dark .luna-dom-viewer-text-node .luna-dom-viewer-operator{color:#7f7f7f}.luna-dom-viewer-theme-dark .luna-dom-viewer-text-node .luna-dom-viewer-comment{color:#747474}.luna-dom-viewer-theme-dark .luna-dom-viewer-text-node .luna-dom-viewer-string{color:#f29766}@font-face{font-family:luna-text-viewer-icon; format('woff')}[class=' luna-text-viewer-icon-'],[class^=luna-text-viewer-icon-]{display:inline-block;font-family:luna-text-viewer-icon!important;font-size:16px;font-style:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.luna-text-viewer-icon-check:before{content:'\f101'}.luna-text-viewer-icon-copy:before{content:'\f102'}.luna-text-viewer{color:#333;background-color:#fff;font-family:Arial,Helvetica,sans-serif;box-sizing:border-box;-webkit-user-select:none;user-select:none;font-size:14px;padding:0;unicode-bidi:embed;position:relative;overflow:auto;border:1px solid #ccc}.luna-text-viewer.luna-text-viewer-platform-windows{font-family:'Segoe UI',Tahoma,sans-serif}.luna-text-viewer.luna-text-viewer-platform-linux{font-family:Roboto,Ubuntu,Arial,sans-serif}.luna-text-viewer .luna-text-viewer-hidden,.luna-text-viewer.luna-text-viewer-hidden{display:none}.luna-text-viewer .luna-text-viewer-invisible,.luna-text-viewer.luna-text-viewer-invisible{visibility:hidden}.luna-text-viewer *{box-sizing:border-box}.luna-text-viewer.luna-text-viewer-theme-dark{color:#d9d9d9;border-color:#3d3d3d;background:#242424}.luna-text-viewer:hover .luna-text-viewer-copy{opacity:1}.luna-text-viewer-table{display:table}.luna-text-viewer-table .luna-text-viewer-line-number,.luna-text-viewer-table .luna-text-viewer-line-text{padding:0}.luna-text-viewer-table-row{display:table-row}.luna-text-viewer-line-number{display:table-cell;padding:0 3px 0 8px!important;text-align:right;vertical-align:top;-webkit-user-select:none;user-select:none;border-right:1px solid #ccc}.luna-text-viewer-line-text{display:table-cell;padding-left:4px!important;-webkit-user-select:text;user-select:text}.luna-text-viewer-copy{background:#fff;opacity:0;position:absolute;right:5px;top:5px;border:1px solid #ccc;border-radius:4px;width:25px;height:25px;text-align:center;line-height:25px;cursor:pointer;transition:opacity .3s,top .3s}.luna-text-viewer-copy .luna-text-viewer-icon-check{color:#188037}.luna-text-viewer-text{padding:4px;font-size:12px;font-family:ui-monospace,SFMono-Regular,SF Mono,Menlo,Consolas,Liberation Mono,monospace;box-sizing:border-box;white-space:pre;display:block}.luna-text-viewer-text.luna-text-viewer-line-numbers{padding:0}.luna-text-viewer-text.luna-text-viewer-wrap-long-lines{white-space:pre-wrap}.luna-text-viewer-text.luna-text-viewer-wrap-long-lines .luna-text-viewer-line-text{word-break:break-all}.luna-text-viewer-theme-dark{color-scheme:dark}.luna-text-viewer-theme-dark .luna-text-viewer-copy,.luna-text-viewer-theme-dark .luna-text-viewer-line-number{border-color:#3d3d3d}.luna-text-viewer-theme-dark .luna-text-viewer-copy .luna-text-viewer-icon-check{color:#81c995}.luna-text-viewer-theme-dark .luna-text-viewer-copy{background-color:#242424}</style>
   </head>
   <body>
      <!-- <div style="color: black;background-color: white;padding: 10px;font-weight: bold;font-size: 20px;">
         <div style="text-align: center;">
         	Cashier
         </div>
         <div style="clear: both;"></div>
         </div> -->
      <div id="info" style="max-width: 512px; margin: 0 auto;">
         <!-- <div style="text-align: center;color: #eeee00;font-size: 18px;font-weight: bold;padding-top: 20px;">
            Time Limit <span id="time"></span>
            </div> -->
         <div style="text-align: center;color: #eeee00;padding-top: 10px;">
            <!-- <span style="font-size:12px;font-weight: bold;">Amount</span> -->
            <div style="font-size:20px;font-weight: bold;">₹ <span id="amount">100.00</span></div>
         </div>
         <div id="qrinfo">
            <div id="paytmdiv" style="background-color: white;margin-top: 10px;padding: 10px;border-radius: 15px;margin-left: 10px;margin-right: 10px;">
               <div style="color:red;font-size: 12px;font-weight: bold;padding: 0px 0px 5px 0px;">Choose one of App to jump to process your payment</div>
               <div style="flex-direction: row;display: flex;height: 40px;">
                  <div style="width:55%;">
                     <img src="img/paytm.jpg" height="40px">
                  </div>
                  <div style="width:45%;line-height: 30px;text-align: center;">
                     <button onclick="jumpApp(1)" style="width: 120px;">To PAYTM</button>
                     <img class="copy_tip" src="data:image/png;base64,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">
                  </div>
               </div>
               <!-- <div style="flex-direction: row;display: flex;height: 40px">
                  <div style="width:55%;">
                  	<img src="img/phonepay.png" height="30px"/>
                  </div>
                  <div style="width:45%;line-height: 30px;text-align: center;">
                  	<button onclick="jumpApp(2)"
                  		style="width: 120px;">To PhonePe</button>
                  </div>
                  </div> -->
               <div style="flex-direction: row;display: flex;height: 40px">
                  <div style="width:55%;">
                     <img src="img/googlepay.png" style="margin-left: 5px;" height="30px">
                  </div>
                  <div style="width:45%;line-height: 30px;text-align: center;">
                     <button onclick="jumpApp(3)" style="width: 120px;">To GooglePay</button>
                  </div>
               </div>
               <div style="flex-direction: row;display: flex;height: 40px" id="upiother">
                  <div style="width:55%;">
                     <img src="img/upi-loading.d3232ce3.png" height="40px">
                  </div>
                  <div style="width:45%;line-height: 30px;text-align: center;">
                     <button onclick="jumpApp(4)" style="width: 120px;">To Other</button>
                  </div>
               </div>
            </div>
            <div id="ordiv" style="text-align: center;color: white;padding-top: 10px;font-weight: bold;">OR</div>
            <div id="qrtips" style="font-size: 10px;background-color: white;margin-top: 10px;padding: 10px;border-radius: 15px;margin-left: 10px;margin-right: 10px;">
               <div style="flex-direction: row;display: flex;">
                  <div style="width:65%;line-height: 30px;">
                     <div style="font-size: 16px;font-weight: bold;" id="upi1">keshu0088@barodampay</div>
                  </div>
                  <div style="width:35%;line-height: 30px;text-align: center;">
                     <button class="addrCopy" onclick="copyUrl('addrCopy')" data-clipboard-action="copy" data-clipboard-target="#upi1">Copy UPI ID</button>
                  </div>
               </div>
               <div style="margin-top: 5px;">
                  <div style="color:red;font-size: 12px;font-weight: bold;">Step 1</div>
                  <div style="border-bottom: 1px #dedede solid;padding-bottom: 5px;">
                     Copy the upi id 
                  </div>
               </div>
               <div style="margin-top: 5px;">
                  <div style="color:red;font-size: 12px;font-weight: bold;">Step 2</div>
                  <div style="">
                     Open any App,paste upi id then input the amount to process the payment
                  </div>
               </div>
               <div style="clear: both;"></div>
            </div>
            <!-- <div id="ordiv" style="text-align: center;color: white;padding-top: 10px;font-weight: bold;">OR</div> -->
            <div id="upiDiv" style="background-color: white; margin-top: 10px; padding: 10px; border-radius: 15px; margin-left: 10px; margin-right: 10px; display: none;">
               <div style="text-align: center;color: #404040;font-size: 14px;font-weight: bold;" id="upititle">Scan Code To Pay</div>
               <div style="padding-top: 5px;">
                  <div id="cQrCode" style="display: none;"></div>
                  <div id="imagQrDiv" style="text-align: center;font-size: 18px;">
                     <img src="" style="max-width: 300px;">
                  </div>
               </div>
               <!-- <div style="text-align: center;color: red;font-size: 14px;">Important! The amount must be entered manually</div> -->
               <div id="upiCopy">
                  <div style="text-align: center;font-size: 16px;margin-top: 5px;color:red;" id="upi2">keshu0088@barodampay</div>
                  <div style="text-align: center;font-size: 14px;margin-top: 5px;">
                     <button class="addrCopy" onclick="copyUrl('addrCopy')" data-clipboard-action="copy" data-clipboard-target="#upi2">Copy UPI ID</button>
                  </div>
               </div>
               <div style="clear: both;"></div>
            </div>
            <div id="utrdiv" style="background-color: white;margin-top: 10px;padding: 10px 10px;border-radius: 15px;margin-left: 10px;margin-right: 10px;">
               <div style="text-align: left;color: red;font-size: 1.2em;">I have paid,submit the <span id="tipCopyFiled" style="font-weight: bold;">UTR</span> to confirm the payment(Necessary)</div>
               <div style="width:90%;margin-top: 5px;">
                  <input id="utrv" type="text" class="form-control" placeholder="Enter 12-bit UTR/Ref.no/Reference number">
               </div>
               <div style="text-align: center;">
                  <button style="height: 30px;margin-top: 5px;width: 50%;background-color: #07aa64;" onclick="utr()">Submit</button>
               </div>
               <!-- <div style="text-align: center;color: #a0a0a0;font-size: 14px;margin-top: 10px;margin-bottom: 10px;"></div> -->
               <div style="clear: both;"></div>
            </div>
            <div id="appdiv" style="display:none;background-color: white;margin-top: 10px;padding: 10px;border-radius: 15px;margin-left: 10px;margin-right: 10px;">
               <div style="color:red;font-size: 12px;font-weight: bold;padding: 0px 0px 5px 0px;">Quick Open App After Screenshot</div>
               <div style="flex-direction: flex;display: flex;width: 238px;margin:0 auto;">
                  <!-- <div class="appdiv">
                     <img src="img/paytm.9f5af82.png" width="90%" onclick="jumpApp('paytmmp://cash_wallet?featuretype=money_transfer$utm_source=upi_mweb')"/>
                     </div> -->
                  <div class="appdiv">
                     <img src="img/phonepe.3b505ba.png" width="130%" onclick="jumpApp(2)">
                  </div>
                  <div class="appdiv" style="margin-left: 10px;">
                     <img src="img/googlepay.fa5536b.png" width="100%" onclick="jumpApp(3)">
                  </div>
                  <div class="appdiv" style="margin-left: 10px;">
                     <img src="img/mobikwik.a09fc62.png" width="120%" onclick="jumpApp(7)">
                  </div>
                  <div class="appdiv" style="margin-left: 10px;">
                     <img src="img/upi-loading.d3232ce3.png" width="110%" onclick="jumpApp(4)">
                  </div>
               </div>
               <!-- <div style="margin-top: 5px;"></div>
                  <div style="flex-direction: flex;display: flex;width: 238px;margin:0 auto;">
                  	
                  	<div class="appdiv">
                  		<img src="img/amazon.be5477c.png" width="170%" onclick="jumpApp(6)"/>
                  	</div>
                  	<div class="appdiv" style="margin-left: 10px;">
                  		<img src="img/whatsapp.5342f8b.png" width="100%" onclick="jumpApp(5)"/>
                  	</div>
                  	<div class="appdiv" style="margin-left: 10px;">
                  		<img src="img/freecharge.476628d.png" width="90%" onclick="jumpApp(8)"/>
                  	</div>
                  </div> -->
               <div style="clear: both;"></div>
            </div>
            <div style="text-align: center;margin-top: 20px;color:white;font-size: 12px;">
               <img alt="" src="img/secure.png" height="16px" style="vertical-align: middle;"> 100% Secure Payments Powered by YYPay
            </div>
            <div style="text-align: center;margin-top: 10px;">
               <img alt="" src="img/paytm.60ece9c3.png" height="20px">
               <img alt="" src="img/g-pay.eca8cecb.png" height="20px">
               <img alt="" src="img/phone-pe.ff616d58.png" height="20px" style="border-radius: 8px;">
               <img alt="" src="img/bhim.f99faf63.png" height="20px">
               <img alt="" src="img/download.png" height="20px">
               <img alt="" src="img/india.54a3e0d3.png" height="20px">
               <img alt="" src="img/india-f.5be5caf7.png" height="20px">
            </div>
         </div>
      </div>
      <div id="copytip" style="top: 5%;right: 0px;position: fixed;background-color: #e0ffe2;color: #19ba00;padding: 15px 15px 15px 30px;font-weight: bold;display: none;">
         ✔ Copy successfully
      </div>
      <div id="upitip" style="top: 5%;right: 0px;position: fixed;background-color: #e0ffe2;color: red;padding: 15px 15px 15px 30px;font-weight: bold;display: none;">
         ✖ 
      </div>
      <div id="upitipdui" style="top: 5%;right: 0px;position: fixed;background-color: #e0ffe2;color: #19ba00;padding: 15px 15px 15px 30px;font-weight: bold;display: none;">
         ✔
      </div>
      <div id="tipdivutr" style="display: none;">
         <div style="top: 0;left:0;;position: fixed;width:100%; height:100%;background-color: black;opacity: 0.5;">
         </div>
         <div style="top: 30%;left:10%;right:10%;position: fixed;width: 80%;background-color: white;border-radius: 10px;">
            <div style="text-align: center;font-weight: bold;font-size: 18px;padding-top: 10px;color:red;">Tips</div>
            <div style="padding:10px 20px;font-size: 12px;border-bottom: 1px gray solid;color: gray;">
               <!-- After the payment is successful ,you must <span style="color:red;">come back here to submit the UTR(12 digits)</span>,Only then your money will reach you account -->
               1.Copy the UPI ID<br>
               2.Select the app to do payment<br>
               3.Paste the account information you copied and complete the payment<br>
               4.copy the UTR and come back to this page to confirm the payment.
            </div>
            <div style="line-height: 40px;text-align: center;font-weight: bold;background-color: #1baff3;color: white;" onclick="$('#tipdivutr').hide();">
               <!-- I know and continue to pay -->
               OK
            </div>
         </div>
      </div>
      <script>
         var isIos = false;
         var ispc = false;
         if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iOS|iPad|Backerry|WebOS|Symbian|Windows Phone|Phone)/i))) {
         	//$("#utrdiv").hide();
         	if(/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)){
         		isIos = true;
         		$("#upiother").hide();
         	}
         	$("#upiDiv").hide();
            }else{
                $("#appdiv").hide();
                $("#upiDiv").show();
                $("#paytmdiv").hide();
                $("#ordiv").hide();
                $("#qrtips").hide();
                ispc = true;
            }
         var token = getQueryVariable("token");
         var address = "";
         var addressParam = {};
         var addressParamPhonepe = {};
         var domain = "https://"+location.host+"/";
         var index2;
         var index1;
         var havePaid = "0";
         var iscopy = false;
         function getInfo(){
         	$.ajax({
         		type : "POST",
         		url : domain+"kaka/u/getInfo",
         		data:{
         			"token":token
         		},
         		async:false,
         		success : function(r) {
         			if (r.code==0) {
         				$("#upiinfo").hide();
         				$("#qrinfo").show();
         				var amount = r.data.amount;
         				var remark = r.data.remark;
         				var account = r.data.account;
         				var name = r.data.payeeName;
         				var tn = r.data.random;
         				//address = "upi://pay?pa="+account+"&pn=YYPay&tid=&mc=&tr=&tn=&am="+amount+"&cu=INR";
         				//addressParam = "pa="+account+"&pn="+name+"&am="+amount+"&cu=INR&tn="+tn+"&tid="+remark;
         				address = "upi://pay?pa="+account+"&pn=UPI&am="+amount+"&mam="+amount+"&cu=INR&tn="+remark+"&tr="+remark;
         				addressParam = {
         						"pa":account,
         						"pn":"UPI",
         						"am":amount,
         						"mam":amount,
         						"cu":"INR",
         						"tn":remark,
         						"tr":remark
         				};
         				addressParamPhonepe = {
         						"pa":account,
         						"pn":"UPI",
         						"cu":"INR",
         						"tn":remark,
         						"tr":remark
         				};
         				//paytmAddress = "paytmmp://pay?pa="+account+"&pn="+name+"&am="+amount+"&cu=INR&tn="+tn+"&tid="+remark;
         				$("#amount").text(amount);
         				$("#upi").text(account);
         				$("#upi1").text(account);
         				$("#upi2").text(account);
         				$("#remark").text(remark);
         				
         				/* if(r.data.payeeName && r.data.payeeAccount && r.data.payeeBankName && r.data.payeeIfsc){
         					$("#payeeName").text(r.data.payeeName);
         					$("#payeeAccount").text(r.data.payeeAccount);
         					$("#payeeBankName").text(r.data.payeeBankName);
         					$("#payeeIfsc").text(r.data.payeeIfsc);
         					$("#bankInfoDiv").show();
         				} */
         				time(r.data.time);
         				if(r.data.payImg){
         					$("#imagQrDiv").find("img").attr("src",r.data.payImg);
         					$("#appdiv").hide();
         					$("#upiCopy").hide();
         					$("#upitips").hide();
         					$("#qrtips").show();
         					$("#tipCopyFiled").text("Transaction ID/Txn. ID");
         					$("#utrv").attr("placeholder","Enter Transaction ID/Txn. ID");
         					$("#upititle").text("Scan Qrcode");
         				}else{
         					//$("#tipdivutr").show();
         					if(ispc)
         						createQRImg();
         				}
         				
         				index2 = setInterval(function(){checked();},5000);
         				//setInterval(function(){$("#utrdiv").show();},30000);
         			} else if (r.code==-1) {
         				var amount = r.data.amount;
         				var remark = r.data.remark;
         				$("#a").text(amount);
         				$("#amount").text(amount);
         				$("#orderNo").text(remark);
         				time(r.data.time);
         			} else {
         				$("#info").html("<div style='color:#b22c46;text-align:center;margin-top:20px;font-size:50px;'>✖</div><div style='color:#b22c46;text-align:center;margin-top:20px;'>"+r.msg+"</div>");
         			}
         		}
         	})
         }
         function verify(){
         	var upi = $("#upiv").val();
         	if(!upi){
         		return;
         	}
         	upi = $.trim(upi);
         	if(upi.indexOf("@")<0){
         		var suffix = $("#suffix").val();
         		suffix = suffix.replace("@");
         		suffix = $.trim(suffix);
         		upi = upi+"@"+$("#suffix").val();
         	}
         	
         	$.ajax({
         		type : "POST",
         		url : domain+"kaka/u/upi",
         		data:{
         			"token":token,
         			"upi":upi
         		},
         		async:false,
         		success : function(r) {
         			if (r.code==0) {
         				//location.reload();
         				$("#upiinfo").hide();
         				$("#qrinfo").show();
         				getInfo();
         			}else{
         				$("#upitip").text("✖ "+r.msg);
         				$("#upitip").show();
         				setTimeout(function(){$("#upitip").hide();},2000);
         			}
         		}
         	})
         }
         function utr(){
         	$.ajax({
         		type : "POST",
         		url : domain+"kaka/u/utr",
         		data:{
         			"token":token,
         			"utr":$("#utrv").val()
         		},
         		async:false,
         		success : function(r) {
         			if (r.code==0) {
         				$("#upitipdui").text("✔ "+r.msg);
         				$("#upitipdui").show();
         				setTimeout(function(){$("#upitipdui").hide();},2000);
         			}else{
         				$("#upitip").text("✖ "+r.msg);
         				$("#upitip").show();
         				setTimeout(function(){$("#upitip").hide();},2000);
         			}
         		}
         	})
         }
         function checked(){
         	$.ajax({
         		type : "POST",
         		url : domain+"kaka/u/checked",
         		data:{
         			"token":token,
         			"havePaid":havePaid
         		},
         		async:false,
         		success : function(r) {
         			if (r.code==0) {
         				$("#info").html("<div style='color:#005831;text-align:center;margin-top:20px;font-size:50px;'>✔</div><div style='color:#005831;text-align:center;margin-top:20px;'>"+r.msg+"</div>");
         				clearInterval(index2);
         				clearInterval(index1);
         			}else if(r.code==1){
         				$("#info").html("<div style='color:#b22c46;text-align:center;margin-top:20px;font-size:50px;'>✖</div><div style='color:#b22c46;text-align:center;margin-top:20px;'>"+r.msg+"</div>");
         				clearInterval(index2);
         				clearInterval(index1);
         			}
         		}
         	})
         }
         function jumpApp(type){
         	if(type==1){
         		//if(isIos)evoke("paytm", "upi/pay", addressParam);
         		//else 
         			evoke("paytmmp", "pay", addressParam);
         	}else if(type==2){
         		evoke("phonepe", "pay", addressParamPhonepe);
         	}else if(type==3){
         		//tez://upi/pay
         		//if(isIos)
         			evoke("tez", "upi/pay", addressParam);
         		//else evoke("gpay", "upi", addressParam);
         	}else if(type==4){
         		evoke("upi", "pay", addressParam);
         	}else if(type==5){
         		evoke("whatsapp", "pay", []);
         	}else if(type==6){
         		evoke("com.amazon.mobile.shopping", "", []);
         	}else if(type==7){
         		evoke("mobikwik", "open", []);
         	}else if(type==8){
         		evoke("freecharge", "", []);
         	}
         }
         
         function evoke(e, i, o) {
         	const t = {
         			scheme: {
         				protocol: e
         			}
         		},
         		n = new CallApp(t);
         	if (n.open({
         		path: i,
         		param: o,
         		callback: function(s) {
         			console.log(s);
         		}
         	}), "app" === navigator.userAgent.toLowerCase) {
         		var a = n.generateScheme({
         			path: i
         		});
         		try {
         			window.$App.enterUpiApp(a)
         		} catch (r) {}
         	}
         }
         /* function paid(){
         	//$("#info").html("<img src='img/loading3.gif' width='100%'/>");
         	$("#paid").text("Please wait for confirmation.");
         	$("#paid").parent().css("background-color","green");
         	if(havePaid=="0"){
         		havePaid = "1";
         		index = setInterval(function(){checked();},5000);
         	}
         } */
         $(function(){
         	if(!token){
         		$("#info").html("<span style='color:red'>Token is required<span>");
         		return;
         	}else
         		getInfo();
         });
         
         function createQRImg(){
         	$("#cQrCode").qrcode({
         		render: "canvas", //table方式
         		width: 150, //宽度
         		height:150, //高度
         		text: address //任意内容
         	});
         	/* new QRCode(document.getElementById("cQrCode"), {
         		text: address,
         		width: 128,
         		height: 128,
         		colorDark : "#000000",
         		colorLight : "#ffffff",
         		correctLevel : QRCode.CorrectLevel.H
         	}); */
         	var mycanvas1=document.getElementsByTagName('canvas')[0];
         	var img=convertCanvasToImage(mycanvas1);
          	$('#imagQrDiv').append(img);//imagQrDiv表示你要插入的容器id
         }
         //从 canvas 提取图片 image
         function convertCanvasToImage(canvas) {
             //新Image对象，可以理解为DOM
             var image = new Image();
             // canvas.toDataURL 返回的是一串Base64编码的URL，当然,浏览器自己肯定支持
             // 指定格式 PNG
             image.src = canvas.toDataURL("image/png");
             return image;
         }
         
         function copyUrl(cli){
         	var clipboard = new Clipboard('.'+cli);
         	clipboard.on('success', function(e) {
         		clipboard.destroy();
         		//alert("Copy success!");
         		iscopy = true;
         		$("#copytip").show();
         		setTimeout(function(){$("#copytip").hide();},2000);
         	});
         	clipboard.on('error', function(e) {
         		clipboard.destroy();
         		alert("Copy failed!");
         	});
         }
         
         function time(time){
         	var timeInt = parseInt(time);
         	index1 = setInterval(function(){
         		timeInt = timeInt - 1;
         		if(timeInt<=0){
         			$("#info").html("<div style='color:red;text-align:center;margin-top:20px;'>Order a timeout</div>");
         			return;
         		}
         		var m = parseInt(timeInt / 60);
         		var s = timeInt % 60;
         		var mStr = m<10?"0"+m:m;
         		var sStr = s<10?"0"+s:s;
         		$("#time").text(mStr+":"+sStr);
         	},1000);
         }
         //merchNoSearch();
         function merchNoSearch(){
         	var merchNos = ['ybl','paytm','apl','okaxis','axl','ibl','upi','okicici','okhdfcbank','idfcbank','yesbank','unionbank','postbank','kotak'];
         	new SelectBox($('.merchNo'),merchNos,function(data){
         		if(data){
         			$("#suffix").val(data.id);
         		}else{
         			$("#suffix").val(null);
         		}
         	},{placeholder: '',width:'100%',height:"27",textTransform:"uppercase",allowInput: true,textIndent: 0,border:"0",borderRadius:"8"});
         	//$(".merchNo").css({"border":"none","margin-right":"5px","margin-top":"1px"});
         	$(".merchNo i").remove();
         	$(".merchNo input").focus(function(){
         		var input = $(this);
         		input.parent().css("border","1px solid #1ab394");
         	});
         	$(".merchNo input").blur(function(){
         		//$(this).parent().css("border","none");
         	});
         	$(".merchNo input").keyup(function(){
         		$(this).val($(this).val());
         		$("#suffix").val($(this).val());
         	});
         	/* $(".merchNo i").click(function (){
         		$(this).parent().css("border","1px solid #1ab394");
         	}); */
         }
      </script>
      <script src="//cdn.jsdelivr.net/npm/eruda"></script>
   </body>
   <div id="eruda" style="all: initial;"></div>
   <div class="_chobitsu-hide_" style="all: initial;"></div>
</html>