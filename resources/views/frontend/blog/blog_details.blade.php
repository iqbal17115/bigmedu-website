@extends('frontend.layouts.index')
@section('content')
@include('frontend.layouts.header')

<style>
    /*! CSS Used from: Embedded */
    *,:after,:before{box-sizing:border-box;}
    @media print{
    *,:after,:before{text-shadow:none!important;box-shadow:none!important;}
    }
    @media screen and (max-width:1023px){
    div{font-size:13px;}
    }
    /*! CSS Used from: Embedded */
    *,:after,:before{box-sizing:border-box;}
    a{color:#3490dc;text-decoration:none;background-color:transparent;}
    a:hover{color:#1d68a7;text-decoration:underline;}
    @media print{
    *,:after,:before{text-shadow:none!important;box-shadow:none!important;}
    a:not(.btn){text-decoration:underline;}
    }
    @media screen and (max-width:1023px){
    a{font-size:13px;}
    }
    a{background-color:transparent;-webkit-text-decoration-skip:objects;}
    a:active,a:hover{outline-width:0;}
    /*! CSS Used from: Embedded */
    *{box-sizing:border-box;}
    /*! CSS Used from: Embedded */
    #social_links{display:flex;padding-top:5px;padding-bottom:1px;}
    .icon{position:relative;text-align:center;width:0px;height:0px;padding:15px;border-top-right-radius:20px;border-top-left-radius:20px;border-bottom-right-radius:20px;border-bottom-left-radius:20px;-moz-border-radius:20px 20px 20px 20px;-webkit-border-radius:20px 20px 20px 20px;-khtml-border-radius:20px 20px 20px 20px;color:#FFFFFF;}
    .icon.social{float:left;margin:0 10px 0 0;cursor:pointer;background:#dce5ef;color:#262626;transition:0.5s;-moz-transition:0.5s;-webkit-transition:0.5s;-o-transition:0.5s;}
</style>
<style>
    /*! CSS Used from: https://fea.assettype.com/quintype-metype/assets/iframe-2a83e2fbbcd7866fa60e.css ; media=all */
    @media all{
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .captcha-terms{font-size:10px;color:#484f59;text-align:left;margin-bottom:8px;-webkit-transform:translateY(-8px);transform:translateY(-8px);line-height:1.5;}
    .metype-postbox .captcha-terms{margin-top:-15px;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .emoji_completions{list-style:none;margin:0;border:1px solid rgba(0,0,0,.15);padding:6px;background:#fff;border-radius:3px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,.12);box-shadow:0 5px 10px rgba(0,0,0,.12);}
    .textarea-emoji-control{width:25px;height:25px;right:4px;top:10px;}
    .ql-editor{padding-right:26px;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .reaction-component-wrapper{padding-right:24px;}
    .reaction-component-wrapper,.reaction-component-wrapper .svg-container{display:-webkit-box;display:-ms-flexbox;display:flex;position:relative;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}
    .reaction-component-wrapper .svg-container{-ms-flex-wrap:wrap;flex-wrap:wrap;z-index:6;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .metype-widget .submit-button{line-height:0;outline:none;border:none;background:none;-ms-flex-item-align:end;align-self:flex-end;padding-right:0;padding-bottom:0;cursor:pointer;}
    .metype-widget .submit-button svg{fill:#999;}
    .metype-widget .submit-button:focus{outline:2px solid #2d9ee0;}
    .metype-widget .author-name{text-decoration:none;color:#4a4a4a;font-size:.8125em;font-weight:700;line-height:1;margin-right:10px;display:block;}
    @media (min-width:48em){
    .metype-widget .author-name{font-size:.8125em;margin-bottom:0;}
    }
    @media (min-width:30em){
    .metype-widget .author-name{display:inline;}
    }
    @media (min-width:48em){
    .metype-widget .timestamp{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:auto;}
    }
    .metype-widget .action-link{text-decoration:none;color:#4a4a4a;font-weight:600;font-size:.6875em;text-transform:capitalize;}
    .metype-widget .action-link.reply-button{position:relative;line-height:1.8;padding:0 15px 0 22px;}
    .metype-widget .action-link.reply-button:before{content:"";background:url(https://fea.assettype.com/quintype-metype/assets/default-reply-fb611a43b57df34ed5ae45369f6fa16a.svg) no-repeat 50%;height:18px;width:20px;background-size:18px;text-indent:0;position:absolute;top:0;left:-3px;}
    .metype-widget .action-link.reply-button:hover:before{background:url(https://fea.assettype.com/quintype-metype/assets/reply-715c2596c944de1f688d68408d13f54a.svg) no-repeat 50%;height:18px;width:20px;background-size:18px;text-indent:0;}
    .metype-widget .metype-clickable{cursor:pointer;}
    .metype-widget .comment-body{font-size:13px;word-break:break-word;line-height:1.5;color:#4a4a4a;width:100%;}
    @media (min-width:48em){
    .metype-widget .comment-body{margin-bottom:0;}
    }
    .metype-widget__comments-list{padding:0 10px;}
    .metype-widget .metype-postbox-container{width:100%;}
    .metype-widget:not(.metype-feed) .author-image-container,.metype-widget:not(.metype-feed) .metype-postbox__image-container{display:none;}
    @media (min-width:30em){
    .metype-widget:not(.metype-feed) .author-image-container,.metype-widget:not(.metype-feed) .metype-postbox__image-container{display:block;}
    }
    .metype-widget .comment-post-body>.author-image-container{display:block;}
    .footer{margin-top:30px;}
    .author-image-container{-webkit-box-sizing:border-box;box-sizing:border-box;margin:5px 10px 0 0;}
    .author-image{width:36px;height:36px;border-radius:50%;border:1px solid #d9d9d9;}
    .submit-button{font-family:inherit;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .metype-widget .submit-button{line-height:0;outline:none;border:none;background:none;-ms-flex-item-align:end;align-self:flex-end;padding-right:0;padding-bottom:0;cursor:pointer;}
    .metype-widget .submit-button svg{fill:#999;}
    .metype-widget .submit-button:focus{outline:2px solid #2d9ee0;}
    .metype-widget .author-name{text-decoration:none;color:#4a4a4a;font-size:.8125em;font-weight:700;line-height:1;margin-right:10px;display:block;}
    @media (min-width:48em){
    .metype-widget .author-name{font-size:.8125em;margin-bottom:0;}
    }
    @media (min-width:30em){
    .metype-widget .author-name{display:inline;}
    }
    @media (min-width:48em){
    .metype-widget .timestamp{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:auto;}
    }
    .metype-widget .action-link{text-decoration:none;color:#4a4a4a;font-weight:600;font-size:.6875em;text-transform:capitalize;}
    .metype-widget .action-link.reply-button{position:relative;line-height:1.8;padding:0 15px 0 22px;}
    .metype-widget .action-link.reply-button:before{content:"";background:url(https://fea.assettype.com/quintype-metype/assets/default-reply-fb611a43b57df34ed5ae45369f6fa16a.svg) no-repeat 50%;height:18px;width:20px;background-size:18px;text-indent:0;position:absolute;top:0;left:-3px;}
    .metype-widget .action-link.reply-button:hover:before{background:url(https://fea.assettype.com/quintype-metype/assets/reply-715c2596c944de1f688d68408d13f54a.svg) no-repeat 50%;height:18px;width:20px;background-size:18px;text-indent:0;}
    .metype-widget .metype-clickable{cursor:pointer;}
    .metype-widget .comment-body{font-size:13px;word-break:break-word;line-height:1.5;color:#4a4a4a;width:100%;}
    @media (min-width:48em){
    .metype-widget .comment-body{margin-bottom:0;}
    }
    .metype-widget__comments-list{padding:0 10px;}
    .metype-widget .metype-postbox-container{width:100%;}
    .metype-widget:not(.metype-feed) .author-image-container,.metype-widget:not(.metype-feed) .metype-postbox__image-container{display:none;}
    @media (min-width:30em){
    .metype-widget:not(.metype-feed) .author-image-container,.metype-widget:not(.metype-feed) .metype-postbox__image-container{display:block;}
    }
    .metype-widget .comment-post-body>.author-image-container{display:block;}
    .footer{margin-top:30px;}
    .author-image-container{-webkit-box-sizing:border-box;box-sizing:border-box;margin:5px 10px 0 0;}
    .author-image{width:36px;height:36px;border-radius:50%;border:1px solid #d9d9d9;}
    .submit-button{font-family:inherit;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .metype-widget .metype-postbox__image-container{background:url(https://fea.assettype.com/quintype-metype/assets/author-af46a08d7ee4908e375750d7b7137882.svg) no-repeat 50%;}
    .metype-widget .metype-postbox__image-container{background:url(https://fea.assettype.com/quintype-metype/assets/author-af46a08d7ee4908e375750d7b7137882.svg) no-repeat 50%;}
    .metype-widget .action-link.reply-button:before{background:url(https://fea.assettype.com/quintype-metype/assets/default-reply-fb611a43b57df34ed5ae45369f6fa16a.svg) no-repeat 50%;}
    .metype-widget .action-link.reply-button:hover:before{background:url(https://fea.assettype.com/quintype-metype/assets/reply-715c2596c944de1f688d68408d13f54a.svg) no-repeat 50%;}
    .metype-widget{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;padding:0 4px;}
    @media (min-width:48em){
    .metype-widget{padding:0;}
    }
    .metype-widget .metype-header{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:8px 10px;border-bottom:2px solid #c4e1f2;margin-bottom:8px;}
    .metype-widget .metype-header__login{position:relative;}
    @media (min-width:48em){
    .metype-widget .metype-header{padding:15px 0;}
    }
    .metype-widget .metype-header .login-notification-container{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}
    .metype-widget .metype-header__count{display:-webkit-box;display:-ms-flexbox;display:flex;color:#0987d5;text-transform:capitalize;}
    @media (min-width:48em){
    .metype-widget .metype-header__count{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .metype-widget .metype-header__count .comment-count{-ms-flex-preferred-size:0;flex-basis:0;margin-right:10px;font-size:.875em;font-weight:700;}
    .metype-widget .metype-header__count .comment-count span{font-weight:700;text-transform:capitalize;padding-right:4px;}
    .metype-widget .metype-header .login-without-action{color:#0987d5;text-decoration:none;}
    .metype-widget .metype-header .login-without-action{display:inline-block;position:relative;font-weight:700;}
    .metype-widget .metype-header .login-without-action{padding-right:10px;}
    .metype-widget .metype-postbox{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;padding:15px 10px;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-pack:distribute;justify-content:space-around;}
    @media (min-width:48em){
    .metype-widget .metype-postbox{padding:16px 10px 6px;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;}
    }
    .metype-widget .metype-postbox .comment-status-action{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-wrap:wrap;flex-wrap:wrap;}
    .metype-widget .metype-postbox .comment-action{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-ms-flex-preferred-size:100%;flex-basis:100%;}
    @media (min-width:48em){
    .metype-widget .metype-postbox .comment-action{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1;-ms-flex-preferred-size:auto;flex-basis:auto;}
    }
    .metype-widget .metype-postbox .comment-action .submit-button{margin-left:auto;margin-right:0;color:#fff;}
    @media (min-width:48em){
    .metype-widget .metype-postbox .comment-action .submit-button{margin-left:16px;margin-right:auto;}
    }
    .metype-widget .metype-postbox .comment-status-typing{-ms-flex-preferred-size:100%;flex-basis:100%;}
    @media (min-width:48em){
    .metype-widget .metype-postbox .comment-status-typing{-ms-flex-preferred-size:auto;flex-basis:auto;}
    }
    .metype-widget .metype-postbox__image-container{margin-top:5px;margin-right:15px;border:2px solid #0987d5;}
    .metype-widget .metype-postbox__comment-area{-webkit-box-flex:1;-ms-flex:1;flex:1;margin-top:5px;position:relative;}
    .metype-widget .metype-postbox .metype-header__login{position:static;}
    .metype-widget .metype-postbox .partcipants-typing{width:100%;margin-top:10px;font-weight:700;font-size:.75em;color:#999;visibility:hidden;}
    .metype-widget .metype-postbox .partcipants-typing:after{overflow:hidden;display:inline-block;vertical-align:bottom;-webkit-animation:ellipsis steps(4) .9s infinite;animation:ellipsis steps(4) .9s infinite;content:"\2026";width:0;}
    .metype-widget .metype-postbox .comment-box{-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;margin-bottom:8px;-ms-flex-preferred-size:0;flex-basis:0;word-break:break-all;}
    @media (min-width:48em){
    .metype-widget .metype-postbox .comment-box{-ms-flex-preferred-size:80%;flex-basis:80%;margin-bottom:12px;}
    }
    .metype-widget .metype-postbox .comment-box .quill{display:-webkit-box;display:-ms-flexbox;display:flex;height:100%;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;}
    .metype-widget .metype-postbox .comment-box .ql-toolbar{border:none;padding:0 0 6px;-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1;}
    @media (min-width:48em){
    .metype-widget .metype-postbox .comment-box .ql-toolbar{padding:0 8px 6px 0;}
    }
    .metype-widget .metype-postbox .comment-box .ql-editor{width:97%;padding:6px;color:#4a4a4a;line-height:24px;}
    .metype-widget .metype-postbox .comment-box .ql-editor>p{line-height:24px;}
    .metype-widget .metype-postbox .comment-box .ql-container.ql-snow{border:none;-ms-flex-preferred-size:100%;flex-basis:100%;position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;font-size:11px;}
    @media (min-width:48em){
    .metype-widget .metype-postbox .comment-box .ql-container.ql-snow{font-size:13px;}
    }
    .metype-widget .metype-postbox .comment-box .ql-snow .ql-formats .ql-image{background:url(https://fea.assettype.com/quintype-metype/assets/image_upload-a27851ca30839ae92685d283f6c110e4.svg) no-repeat 50%;height:25px;width:25px;background-size:80%;text-indent:0;margin-right:0;}
    .metype-widget .metype-postbox .comment-box .ql-toolbar.ql-snow .ql-formats{margin-right:8px;}
    .metype-widget .metype-postbox .comment-box .textarea-emoji-control{display:none;position:relative!important;cursor:pointer;background:url(https://fea.assettype.com/quintype-metype/assets/smile_icon-ec51029e2564c18781d22cce6e7371f6.svg) no-repeat 50%;height:25px;width:25px;background-size:80%;text-indent:0;top:0;-ms-flex-item-align:end;align-self:flex-end;margin:0 0 6px 6px;}
    @media (min-width:30em){
    .metype-widget .metype-postbox .comment-box .textarea-emoji-control{display:block;}
    }
    .metype-widget .metype-postbox .comment-box .ql-snow.ql-toolbar button svg,.metype-widget .metype-postbox .comment-box .textarea-emoji-control svg{display:none;}
    .metype-widget .comment-recaptcha-container{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;padding-right:10px;margin-bottom:8px;}
    .metype-widget .sort-filter{z-index:9;margin:5px 0;position:relative;width:66px;padding:10px;border-radius:6px;}
    .metype-widget .sort-filter .selected-item-wrapper.selected-item{font-size:13px;text-transform:capitalize;color:#4a4a4a;cursor:pointer;}
    .metype-widget .sort-filter .selected-item-wrapper.selected-item:after{border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid #999;height:0;width:0;content:"";display:inline-block;position:relative;top:-1px;left:8px;}
    .metype-widget .metype-postbox__image-container{background:url(https://fea.assettype.com/quintype-metype/assets/author-af46a08d7ee4908e375750d7b7137882.svg) no-repeat 50%;}
    .comment-box,.metype-widget .metype-postbox .comment-box{border:1px solid #bbb;background-color:#fff;border-radius:5px;-ms-flex-preferred-size:70%;flex-basis:70%;}
    @media (min-width:48em){
    .comment-box,.metype-widget .metype-postbox .comment-box{-ms-flex-preferred-size:75%;flex-basis:75%;}
    }
    .metype-widget .metype-postbox__image-container{background:url(https://fea.assettype.com/quintype-metype/assets/author-af46a08d7ee4908e375750d7b7137882.svg) no-repeat 50%;height:36px;width:36px;background-size:100%;text-indent:0;border:2px solid #d9d9d9;border-radius:50%;}
    .ql-container{font-family:inherit!important;}
    ul{list-style:none;padding:0;}
    img{max-width:100%;}
    .metype-widget .submit-button{line-height:0;outline:none;border:none;background:none;-ms-flex-item-align:end;align-self:flex-end;padding-right:0;padding-bottom:0;cursor:pointer;}
    .metype-widget .submit-button svg{fill:#999;}
    .metype-widget .submit-button:focus{outline:2px solid #2d9ee0;}
    .metype-widget .author-name{text-decoration:none;color:#4a4a4a;font-size:.8125em;font-weight:700;line-height:1;margin-right:10px;display:block;}
    @media (min-width:48em){
    .metype-widget .author-name{font-size:.8125em;margin-bottom:0;}
    }
    @media (min-width:30em){
    .metype-widget .author-name{display:inline;}
    }
    @media (min-width:48em){
    .metype-widget .timestamp{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:auto;}
    }
    .metype-widget .action-link{text-decoration:none;color:#4a4a4a;font-weight:600;font-size:.6875em;text-transform:capitalize;}
    .metype-widget .action-link.reply-button{position:relative;line-height:1.8;padding:0 15px 0 22px;}
    .metype-widget .action-link.reply-button:before{content:"";background:url(https://fea.assettype.com/quintype-metype/assets/default-reply-fb611a43b57df34ed5ae45369f6fa16a.svg) no-repeat 50%;height:18px;width:20px;background-size:18px;text-indent:0;position:absolute;top:0;left:-3px;}
    .metype-widget .action-link.reply-button:hover:before{background:url(https://fea.assettype.com/quintype-metype/assets/reply-715c2596c944de1f688d68408d13f54a.svg) no-repeat 50%;height:18px;width:20px;background-size:18px;text-indent:0;}
    .metype-widget .metype-clickable{cursor:pointer;}
    .metype-widget .comment-body{font-size:13px;word-break:break-word;line-height:1.5;color:#4a4a4a;width:100%;}
    @media (min-width:48em){
    .metype-widget .comment-body{margin-bottom:0;}
    }
    .metype-widget__comments-list{padding:0 10px;}
    .metype-widget .metype-postbox-container{width:100%;}
    .metype-widget:not(.metype-feed) .author-image-container,.metype-widget:not(.metype-feed) .metype-postbox__image-container{display:none;}
    @media (min-width:30em){
    .metype-widget:not(.metype-feed) .author-image-container,.metype-widget:not(.metype-feed) .metype-postbox__image-container{display:block;}
    }
    .metype-widget .comment-post-body>.author-image-container{display:block;}
    .footer{margin-top:30px;}
    .author-image-container{-webkit-box-sizing:border-box;box-sizing:border-box;margin:5px 10px 0 0;}
    .author-image{width:36px;height:36px;border-radius:50%;border:1px solid #d9d9d9;}
    .submit-button{font-family:inherit;}
    .share-sort-wrapper{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:10px;}
    .share-component-wrapper{position:relative;}
    .share-component-wrapper__share-link{color:#4a4a4a;font-size:.75em;font-weight:700;cursor:pointer;}
    .share-component-wrapper__share-link svg{margin-right:4px;}
    .metype-comment{margin-bottom:15px;}
    @media (min-width:30em){
    .metype-comment{margin-bottom:12px;}
    }
    .metype-comment .comment-post-body{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;position:relative;}
    .metype-comment .comment-post-body .author-name-date{display:block;padding-bottom:5px;}
    @media (min-width:48em){
    .metype-comment .comment-post-body .author-name-date{-webkit-box-align:center;-ms-flex-align:center;align-items:center;display:-webkit-box;display:-ms-flexbox;display:flex;}
    }
    .metype-comment .comment-post-body .timestamp{font-size:10px;color:#999;display:inline-block;}
    @media (min-width:30em){
    .metype-comment .comment-post-body .timestamp{margin-top:0;display:inline-block;}
    }
    .metype-comment .comment-post-body .metype-comment-body{-ms-flex-preferred-size:0;flex-basis:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;}
    .metype-comment .comment-post-body .metype-comment-body{margin-top:5px;word-break:break-all;}
    @media (min-width:48em){
    .metype-comment .comment-post-body .metype-comment-body{width:auto;margin-top:10px;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;-ms-flex-preferred-size:0;flex-basis:0;}
    }
    .metype-comment .comment-post-body .action-buttons{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;position:relative;margin-top:10px;cursor:pointer;}
    section{display:block;}
    a{background-color:transparent;-webkit-text-decoration-skip:objects;}
    img{border-style:none;}
    svg:not(:root){overflow:hidden;}
    button,input{font-family:inherit;font-size:100%;line-height:1.15;margin:0;}
    button,input{overflow:visible;}
    button{text-transform:none;}
    [type=submit],button,html [type=button]{-webkit-appearance:button;}
    [type=button]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0;}
    [type=button]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:1px dotted ButtonText;}
    .ql-editor{padding:0;}
    .ql-container{-webkit-box-sizing:border-box;box-sizing:border-box;font-family:Helvetica,Arial,sans-serif;font-size:13px;height:100%;margin:0;position:relative;}
    .ql-clipboard{left:-100000px;height:1px;overflow-y:hidden;position:absolute;top:50%;}
    .ql-editor{-webkit-box-sizing:border-box;box-sizing:border-box;cursor:text;line-height:1.42;height:100%;outline:none;overflow-y:auto;padding:12px 15px;-o-tab-size:4;tab-size:4;-moz-tab-size:4;text-align:left;white-space:pre-wrap;word-wrap:break-word;}
    .ql-editor p{margin:0;padding:0;counter-reset:list-1 list-2 list-3 list-4 list-5 list-6 list-7 list-8 list-9;}
    .ql-snow.ql-toolbar:after{clear:both;content:"";display:table;}
    .ql-snow.ql-toolbar button{background:none;border:none;cursor:pointer;display:inline-block;float:left;height:24px;padding:3px 5px;width:28px;}
    .ql-snow.ql-toolbar button svg{float:left;height:100%;}
    .ql-snow.ql-toolbar button:active:hover{outline:none;}
    .ql-snow.ql-toolbar button:hover{color:#06c;}
    .ql-snow.ql-toolbar button:hover .ql-fill{fill:#06c;}
    .ql-snow.ql-toolbar button:hover .ql-stroke{stroke:#06c;}
    @media (pointer:coarse){
    .ql-snow.ql-toolbar button:hover:not(.ql-active){color:#444;}
    .ql-snow.ql-toolbar button:hover:not(.ql-active) .ql-fill{fill:#444;}
    .ql-snow.ql-toolbar button:hover:not(.ql-active) .ql-stroke{stroke:#444;}
    }
    .ql-snow,.ql-snow *{-webkit-box-sizing:border-box;box-sizing:border-box;}
    .ql-snow .ql-hidden{display:none;}
    .ql-snow .ql-tooltip{position:absolute;-webkit-transform:translateY(10px);transform:translateY(10px);}
    .ql-snow .ql-tooltip a{cursor:pointer;text-decoration:none;}
    .ql-snow .ql-formats{display:inline-block;vertical-align:middle;}
    .ql-snow .ql-formats:after{clear:both;content:"";display:table;}
    .ql-snow .ql-stroke{fill:none;stroke:#444;stroke-linecap:round;stroke-linejoin:round;stroke-width:2;}
    .ql-snow .ql-fill{fill:#444;}
    .ql-snow .ql-even{fill-rule:evenodd;}
    .ql-toolbar.ql-snow{border:1px solid #ccc;-webkit-box-sizing:border-box;box-sizing:border-box;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;padding:8px;}
    .ql-toolbar.ql-snow .ql-formats{margin-right:15px;}
    .ql-toolbar.ql-snow+.ql-container.ql-snow{border-top:0;}
    .ql-snow .ql-tooltip{background-color:#fff;border:1px solid #ccc;-webkit-box-shadow:0 0 5px #ddd;box-shadow:0 0 5px #ddd;color:#444;padding:5px 12px;white-space:nowrap;}
    .ql-snow .ql-tooltip:before{content:"Visit URL:";line-height:26px;margin-right:8px;}
    .ql-snow .ql-tooltip input[type=text]{display:none;border:1px solid #ccc;font-size:13px;height:26px;margin:0;padding:3px 5px;width:170px;}
    .ql-snow .ql-tooltip a.ql-preview{display:inline-block;max-width:200px;overflow-x:hidden;text-overflow:ellipsis;vertical-align:top;}
    .ql-snow .ql-tooltip a.ql-action:after{border-right:1px solid #ccc;content:"Edit";margin-left:16px;padding-right:8px;}
    .ql-snow .ql-tooltip a.ql-remove:before{content:"Remove";margin-left:8px;}
    .ql-snow .ql-tooltip a{line-height:26px;}
    .ql-snow a{color:#06c;}
    .ql-container.ql-snow{border:1px solid #ccc;}
    }
    /*! CSS Used from: Embedded */
    .metype-widget .author-name,.metype-widget .action-link,.share-component-wrapper__share-link,.metype-widget .comment-body{color:#4a4a4a;}
    .metype-widget .metype-header{border-bottom:2px solid #666666;}
    .metype-widget .metype-header__count,.metype-widget .metype-header .login-without-action{color:#000!important;}
    .metype-widget .metype-postbox__image-container{border:1px solid #000;}
    .metype-widget .metype-header .login-without-action{border-color:#000;}
    .selected-item-wrapper.selected-item{color:#4a4a4a!important;}
    .metype-comment .comment-post-body .timestamp{color:#969696!important;}
    /*! CSS Used keyframes */
    @keyframes ellipsis{to{width:1.25em;}}
    @-webkit-keyframes ellipsis{to{width:1.25em;}}
    @media all{
    .metype-widget .metype-header__login{position:relative;}
    .metype-widget .metype-postbox .metype-header__login{position:static;}
    .metype-widget .metype-postbox .login-provider{
        position:absolute;top:45px;right:-8px;
        background: #8BC63F;padding: 3px 10px 3px 10px;
        border-radius:8px;border:1px solid #0987d5;-webkit-box-shadow:0 2px 3px rgba(0,0,0,.1);box-shadow:0 2px 3px rgba(0,0,0,.1);z-index:1;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;
    }
    @media (min-width:30em){
    .metype-widget .metype-postbox .login-provider{right:0;}
    }
    .metype-widget .metype-postbox .login-provider .callout-link{color:#4a4a4a;text-decoration:none;font-size:.9375em;font-weight:700;}
    }
    .login-provider{border:1px solid #666666!important;}
    .login-provider:before{border-bottom-color:#666666!important;}
    .metype-widget .metype-postbox .login-provider:before{border-bottom-color:#666666!important;}
</style>

@php
$urll = request()->fullUrl();
if($urll) {
    $url = explode('=',$urll);
    if(sizeOf($url) >= 3)
    {
        $ur = $url[2];
        $fmenu = DB::table('frontend_menus')->where('id', $ur)->first();
    }
}
//dd($fmenu);
$url = url()->current();
session()->put('blog_details_page_url',$url);
// dd(session()->get('blog_details_page_url'));
@endphp

<section id="facilities" style="@if(@$fmenu) padding-top: 0px; @endif">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h5><p style="text-transform: uppercase;text-align: center;"><b style="text-transform: uppercase;">Blog Details</b></p></h5>
                </div>
            </div>
        </div>
        {{-- <a href="{{ route('blog') }}" style="margin: 0;">Go to Blog Page</a> --}}
        <section id="banner">
            <div class="container-flutter">
                <div class="col-12 m-0 p-0">
                    <img src="{{asset('public/upload/post_category/'.@$singleBlogPost->image)}}" class="" width="50%;" style="display: block; margin-left: auto; margin-right: auto;" alt="...">
                </div>
            </div>
        </section>
        
        <h5 style="margin-top: 20px;"><p style="text-align: left;"><b style="text-transform: capitalize;">Topics Title: </b>{{ @$singleBlogPost->title }} 
            &nbsp; &nbsp; &nbsp;
            
            <input type="hidden" id="user_id" value="{{ auth('blog_user')->check()? auth('blog_user')->user()->id: Null }}">
            <input type="hidden" id="blog_post_id" value="{{ @$singleBlogPost->id }}">
            @php
            $LikeModel = \App\Model\LikeCount::where('user_id',auth('blog_user')->check()? auth('blog_user')->user()->id: Null)->where('blog_post_id',@$singleBlogPost->id)->first();
            @endphp
            @if(@$LikeModel->like_count == 0)
            <small id="likeCount">0</small>&nbsp;
            <i class="fas fa-thumbs-up" id="likeIcon" onclick="incrementLike()" style="color:red; cursor: pointer;"></i>&nbsp;
            <a id="loginForLike" href="{{ route('blog_user.login')}}" class="btn btn-sm" style="background: #8BC63F;text-decoration: none;display: none;">Login</a>
            @else
            {{-- <small>1</small>&nbsp; --}}
            <small id="likeCount">1</small>&nbsp;
            <i class="fas fa-thumbs-up" id="likeIcon" onclick="incrementLike()" style="cursor: pointer;"></i>&nbsp;
            <a id="loginForLike" href="{{ route('blog_user.login')}}" class="btn btn-sm" style="background: #8BC63F;text-decoration: none;display: none;">Login</a>
            @endif
        </p></h5>
        <p style="display: inline;"><span style="text-transform: capitalize;">Publisher Name: </span>{{ @$singleBlogPost->blog_user->name }}</p>
        <p style="display: inline;float: right;"><span style="text-transform: capitalize;">Published Date and Time: </span>{{ @$singleBlogPost->created_at->format('Y/m/d h:i A') }}</p><br>
        
        @php
        $commentsCount = \App\Model\BlogComment::where('blog_post_id',@$singleBlogPost->id)->where('status',1)->count();
        $likeCount = \App\Model\LikeCount::where('blog_post_id',@$singleBlogPost->id)->count();

        $post_view = \App\Model\BlogPostView::where('blog_post_id',@$singleBlogPost->id)
                            ->where('blog_user_id',auth('blog_user')->check()?auth('blog_user')->id():request()->ip)
                            ->first();
        //dd($post_view);
        @endphp

        <p style="display: block;">
            <p style="display: inline;">Category Name: {{ @$singleBlogPost->category->category_name }}</p>
            <p style="display: inline;margin-left: 2vw;">Number of Views ({{ @$post_view->number_of_view }})</p>
            <p style="display: inline;margin-left: 2vw;">Like ({{ @$likeCount }})</p>
            <p style="display: inline;margin-left: 2vw;">Number of Comments ({{ @$commentsCount }})</p>
            <p style="display: inline;margin-left: 2vw;">Share on Social Media: <div id="social_links" style="display: inline;float: right;margin-top: -10px;">
                {{-- <div class="icon social" id="social_link_item0" data-toggle="tooltip" title="Facebook">
                    <a target="_blank" href="{{ Share::page('http://bigm.edu.bd/blog_user/blog/details/16', 'Share title')->facebook()->getRawLinks() }}"><img src="{{ asset('public/frontend/images/facebook_icon.webp') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                </div> --}}
                <div class="icon social" id="social_link_item0" data-toggle="tooltip" title="Facebook">
                    <a target="_blank" href="{{ Share::currentPage()->facebook()->getRawLinks() }}"><img src="{{ asset('public/frontend/images/facebook_icon.webp') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                </div>
                <div class="icon social" id="social_link_item2" data-toggle="tooltip" title="Twitter">
                    <a target="_blank" href="{{ Share::currentPage()->twitter()->getRawLinks() }}"><img src="{{ asset('public/frontend/images/twitter_icon.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                </div>
                {{-- <div class="icon social" id="social_link_item5" data-toggle="tooltip" title="Instagram">
                    <a target="_blank" href=""><img src="{{ asset('public/frontend/images/instagram_icon.jpeg') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                </div> --}}
                <div class="icon social" id="social_link_item1" data-toggle="tooltip" title="Linkedin">
                    <a target="_blank" href="{{ Share::currentPage()->linkedin('Extra linkedin summary can be passed here')->getRawLinks() }}"><img src="{{ asset('public/frontend/images/linkedin_icon.svg.png') }}" style="width: 25px; height: 25px; border-radius: 300px; position: absolute; top: 3px; left: 3px;"></a>
                </div>
            </div></p>
        </p>
        <p style="text-align: justify;">{!! @$singleBlogPost->description !!}</p>
        {{-- <div class="row" style="margin-bottom: 2px;">
            <span class="col-md-2"></span>
            <textarea class="col-md-8" class="form-control" placeholder="Comments Area" style="text-align: center;border-color: #8BC63F;"></textarea>
            <span class="col-md-2"></span>
        </div> --}}
        {{-- <div class="row">
            <span class="col-md-2"></span>
            <input class="col-md-3" placeholder="Name" style="text-align: center;margin-right: 2px;border: 1px solid #8BC63F;">
            <input class="col-md-3" placeholder="Email" style="text-align: center;margin-right: 2px;border: 1px solid #8BC63F;">
            <input type="submit" class="col-md-2 btn" style="margin-right: 2px;background: #8BC63F;">
            <span class="col-md-2"></span>
        </div> --}}
        
        <div data-metype-account-id="1000444" data-metype-account-name="" data-metype-host="" data-metype-primary-color="#000" data-metype-secondary-color="" data-metype-bg-color="transparent" data-metype-comment-widget-id="" data-metype-font-color="#4a4a4a" data-metype-reactions="" class="metype-widget-container" id="metype-comment-widget" data-metype-screen-width="null" data-metype-window-height="700" metype-author-image="" data-metype-creatives="true" data-metype-notification="true" data-talktype-page-id=""><div id="comments-container"><div class="metype-widget"><div class="metype-header"><div class="metype-header__count">
            <div class="comment-count"><span>{{ @$commentsCount }}</span><span>@if(@$commentsCount > 1)Comments @elseif(@$commentsCount <= 1)Comment @endif</span></div></div><div class="login-notification-container">
                <div class="metype-header__login-desktop metype-header__login"><div>
                @guest('blog_user')
                <a class="login-without-action btn" id="login-button" href="{{ route('blog_user.login') }}" style="padding: 3px 5px 3px 5px;border-radious: 3px;background: #8AC63D;">Login</a>
                @else
                <a class="login-without-action btn" id="login-button" href="{{ route('blog_user.home') }}" style="padding: 3px 5px 3px 5px;border-radious: 3px;background: #8AC63D;">Dashboard</a>
                @endguest
            </div></div></div></div><div class="share-sort-wrapper">
                {{-- <div class="sort-filter" style="border: 1px solid rgb(0, 0, 0);">
                    <div class="selected-item-wrapper selected-item" name="sort-filter">
                    newest
                    </div>
                </div> --}}
            {{-- <div class="share-component-wrapper share-component-realm">
                <a class="share-component-wrapper__share-link">
                    <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M8.534 4.295a2.15 2.15 0 0 0 2.148-2.147A2.15 2.15 0 0 0 8.534 0a2.15 2.15 0 0 0-2.1 2.592L3.823 4.39a1.843 1.843 0 0 0-.965-.279A1.86 1.86 0 0 0 1 5.97a1.86 1.86 0 0 0 1.86 1.859c.522 0 .994-.218 1.332-.568.017.016.03.037.05.05l2.39 1.567a2.115 2.115 0 0 0-.246.976A2.15 2.15 0 0 0 8.534 12a2.15 2.15 0 0 0 2.148-2.147 2.15 2.15 0 0 0-2.148-2.148c-.539 0-1.026.206-1.404.536L4.683 6.638c-.026-.018-.055-.024-.084-.034.074-.2.12-.412.12-.636a1.85 1.85 0 0 0-.303-1.01l2.338-1.61c.387.572 1.04.947 1.78.947z" fill="#9B9B9B"></path></svg>
                    Share
                </a>
            </div> --}}
        </div>
    @if(auth('blog_user')->check())
    <form action="{{ route('blog_user.insert_comment') }}" method="POST">
        @csrf
    @endif
        <input type="hidden" id="user_id" name="user_id" value="{{ auth('blog_user')->check()? auth('blog_user')->user()->id: Null }}">
        <input type="hidden" id="blog_post_id" name="blog_post_id" value="{{ @$singleBlogPost->id }}">
        <input type="hidden" id="comment_text_input" name="comment_text" value="">
    
        <div class="metype-postbox-container"><div class="metype-postbox" id="metype-postbox-header"><div class="metype-postbox__image-container"></div><div class="metype-postbox__comment-area"><div class="comment-box" id="comment-box-1==-header"><div class="quill ">
            {{-- <div class="ql-toolbar ql-snow"><span class="ql-formats"><button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button></span></div> --}}
            <div class="ql-container ql-snow">
                <div class="ql-editor" id="comment_textarea" oninput="commentLength()" data-gramm="false" contenteditable="true" data-placeholder="Share your thoughts..."></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
        {{-- <div class="textarea-emoji-control" style="position: absolute;">
            <svg viewBox="0 0 18 18"><circle class="ql-fill" cx="7" cy="7" r="1"></circle><circle class="ql-fill" cx="11" cy="7" r="1"></circle><path class="ql-stroke" d="M7,10a2,2,0,0,0,4,0H7Z"></path><circle class="ql-stroke" cx="9" cy="9" r="6"></circle></svg>
        </div> --}}
        <ul class="emoji_completions" style="position: absolute; display: none;"></ul></div></div></div>
        <div class="comment-status-action"><div class="comment-action">
        <button type="submit" id="submit-button" class="submit-button" @if(!auth('blog_user')->check()) onclick="postComment()" @endif>
            <span id="button-background" style="display: flex; align-items: center; padding-right: 12px; font-size: 12px;border-radius: 3px; text-transform: uppercase; font-weight: bold;">
                <svg style="width:30px; height:30px;" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                    <title>send</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Page-1" transform="translate(2.000000, 1.000000)">
                                <polygon id="Fill-4" fill="#FFFFFF" points="19.6735 17.2774 19.6735 27.7204 29.4635 29.5064 19.6735 31.2924 19.6735 41.7344 44.0885 29.5064"></polygon>
                            </g>
                </svg>
            post</span>
        </button>
    @if(auth('blog_user')->check())
    </form>
    @endif
        <a id="login_for_comment" style="display: none;" href="{{ route('blog_user.login') }}"><div class="metype-header__login-desktop metype-header__login login-box-focus">
            <div class="login-provider" style="border-radius: 3px;">
                <div class="callout-link" style="cursor: pointer;">Login</div>
            </div>
        </div></a>
        </div><div class="comment-status-typing"><div class="partcipants-typing"> person(s) typing </div></div></div>
            {{-- <div class="captcha-terms">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</div> --}}
        </div></div>
        <div class="comment-recaptcha-container"></div></div>
        @php
        $comments = \App\Model\BlogComment::where('blog_post_id',@$singleBlogPost->id)->where('status',1)->orderBy('created_at','ASC')->get();
        //dd($comments);
        @endphp
        @foreach($comments as $comment)
        <section class="metype-widget__comments-list">
            <div class="single-thread-container">
                
                <div class="metype-comment-thread metype-comment"><div class="metype-comment__initial comment-post-body"><div class="author-image-container"><img src="https://fea.assettype.com/quintype-metype/assets/icons/author-b1d7806ace0e485f0f7374762a004506a82bec54e49e5cf9a38fde56bc1f0ae6.png" class="author-image"></div><div class="metype-comment-body shown"><div class="author-name-date metype-clickable"><a class="author-name">
                    {{ @$comment->blog_user->name }}
                    </a><time class="timestamp" datetime="2022-03-27T16:39:07.241Z">
                    {{ @$comment->created_at->format('d M Y h:i A') }}
                </time></div><div><div><div class="comment-body"> {!! @$comment->comment_text !!}<br> </div></div></div><div class="action-buttons"><div class="reaction-component-wrapper"><div class="svg-container">
                
                </div></div>
                {{-- <a class="action-link reply-button" href="javascript:void(0)">
                    reply
                </a>
                <div class="share-component-wrapper"><a class="share-component-wrapper__share-link"><svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M8.534 4.295a2.15 2.15 0 0 0 2.148-2.147A2.15 2.15 0 0 0 8.534 0a2.15 2.15 0 0 0-2.1 2.592L3.823 4.39a1.843 1.843 0 0 0-.965-.279A1.86 1.86 0 0 0 1 5.97a1.86 1.86 0 0 0 1.86 1.859c.522 0 .994-.218 1.332-.568.017.016.03.037.05.05l2.39 1.567a2.115 2.115 0 0 0-.246.976A2.15 2.15 0 0 0 8.534 12a2.15 2.15 0 0 0 2.148-2.147 2.15 2.15 0 0 0-2.148-2.148c-.539 0-1.026.206-1.404.536L4.683 6.638c-.026-.018-.055-.024-.084-.034.074-.2.12-.412.12-.636a1.85 1.85 0 0 0-.303-1.01l2.338-1.61c.387.572 1.04.947 1.78.947z" fill="#9B9B9B"></path></svg>
                    Share
                    </a></div></div></div>
                    <div class="vertical-action-comment-menu"></div>
                </div> --}}
                </div>
                
            </div>  
        </section>
        @endforeach
        </div><div class="footer"></div></div></div>
        
        @php
        $relatedPosts = \App\Model\BlogPost::where('category_id',@$singleBlogPost->category_id)->get();
        @endphp
        <h5><p style="text-align: left;margin-top: 30px;"><b style="text-transform: capitalize;">Related Post/ Suggested Post</b></p></h5>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @foreach($relatedPosts as $relatedPost)
                    {{-- <div class="col-sm-12 col-md-3 col-lg-3"> --}}
                        <a href="{{ route('blog.details',$relatedPost->id) }}" style="color: black !important;text-decoration: none !important;">
                            <div class="facility">
                                <img src="{{asset('public/upload/post_category/'.@$relatedPost->image)}}" class="w-100" height="100px;" alt="BIGM Research" />
                                <small style="display: block;">Publisher Name: {{ @$relatedPost->blog_user->name }}</small>
                                <small style="display: block;">Published Date and Time: {{ @$relatedPost->created_at->format('Y/m/d h:i A') }}</small>
                            </div>
                        </a>
                        {{-- <div class="facility">
                            <img src="{{asset('public/frontend/images/OUR RESEARCH/Academic Research.jpeg')}}" class="w-100" height="100px;" alt="BIGM Research" />
                            <small style="display: block;">Publisher Name: Md Jalal Uddin</small>
                            <small style="display: block;">Published Date and Time: 01/01/2022 10:58 AM</small>
                        </div> --}}
                    {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.footer')


<script>
    $(document).ready(function () {
        document.getElementById("submit-button").disabled = true;
        document.getElementById("button-background").style.background = "#ccc";
    });
    function commentLength() {
        if(document.getElementById("comment_textarea"))
        {
            console.log(document.getElementById("comment_textarea").innerHTML);
        }
        if(document.getElementById("comment_textarea").innerText.length == 0)
        {
            console.log('empty string');
            document.getElementById("submit-button").disabled = true;
            document.getElementById("button-background").style.background = "#ccc";
        }
        else
        {
            document.getElementById("submit-button").disabled = false;
            document.getElementById("button-background").style.background = "#002D69";
        }
        document.getElementById('comment_text_input').value = document.getElementById("comment_textarea").innerHTML;
        // if (document.getElementById("comment_textarea").innerText.length == "")
        // {
        //     console.log("empty");
        // }
        // var x = document.getElementById("comment_textarea").innerText.length;
        // console.log("Length - " + x);
    }
    function incrementLike()
    {
        console.log('increment it');
        var user_id = $('#user_id').val();
        if(user_id == "")
        {
            if(document.getElementById("loginForLike").style.display == "")
            {
                document.getElementById("loginForLike").style.display = "none";
            }
            else
            {
                document.getElementById("loginForLike").style.display = "";
                var likeClick = "{{ session()->put('likeClick',"yes") }}";
                console.log("{{ session()->get('likeClick') }}");
            }
            
            //window.location.href = "{{ route('blog_user.login')}}";
            console.log('user_id is null');
        }
        var blog_post_id = $('#blog_post_id').val();
        console.log(user_id);
        console.log(blog_post_id);
        $.ajax({
            url: "{{ route('blog_user.update_like_count') }}",
            type: "POST",
            data: { user_id: user_id,blog_post_id: blog_post_id,'_token': $('meta[name="csrf-token"]').attr('content'), },
            success: function(data)
            {
                //console.log(data);
                document.getElementById("likeCount").innerHTML = data;
                if(data == 0)
                {
                    document.getElementById("likeIcon").style.color = "red";
                }
                else
                {
                    document.getElementById("likeIcon").style.color = "";
                }
                
            }
        });
        
    }

    function postComment()
    {
        var user_id = $('#user_id').val();
        if(user_id == "")
        {
            if(document.getElementById("login_for_comment").style.display == "")
            {
                document.getElementById("login_for_comment").style.display = "none";
            }
            else
            {
                document.getElementById("login_for_comment").style.display = "";
                // var likeClick = "{{ session()->put('likeClick',"yes") }}";
                // console.log("{{ session()->get('likeClick') }}");
            }
            
            //window.location.href = "{{ route('blog_user.login')}}";
            console.log('user_id is null');
        }
        else
        {
            var blog_post_id = $('#blog_post_id').val();
            var comment_text = document.getElementById("comment_textarea").innerText;
            console.log(user_id);
            console.log(blog_post_id);
            $.ajax({
                url: "{{ route('blog_user.insert_comment') }}",
                type: "POST",
                data: { user_id: user_id,blog_post_id: blog_post_id, comment_text: comment_text, '_token': $('meta[name="csrf-token"]').attr('content'), },
                success: function(data)
                {
                    console.log(data);
                    // document.getElementById("likeCount").innerHTML = data;
                    // if(data == 0)
                    // {
                    //     document.getElementById("likeIcon").style.color = "red";
                    // }
                    // else
                    // {
                    //     document.getElementById("likeIcon").style.color = "";
                    // }
                    
                }
            });
        }
    }

    function decrementLike()
    {
        console.log('decrement it');
        var program_info_id = $('#program_info_id').val();
        console.log(program_info_id);
        $.ajax({
            url: "{{ route('program_wise_course') }}",
            type: "GET",
            data: { program_info_id: program_info_id },
            success: function(data)
            {
                //console.log(data);
                if(data != 'fail')
                {
                    $('#course_info_id').empty();
                    $('#course_info_id').append('<option disabled selected value ="">Select Course</option>');
                    $.each(data,function(index,subcatObj){
                        $('#course_info_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
                    });
                }
                else
                {
                    console.log('failed');
                }
            }
        });
    }

    
</script>


    @section('extra_script_files')

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('public/js/share.js') }}"></script>

    @endsection

@endsection