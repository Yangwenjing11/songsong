<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="/laravel/css/css.css" />
<script type="text/javascript" src="/laravel/js/jquery.min.js"></script>
</head>
<body>
    <div id="pageAll">
        <div class="pageTop">
            <div class="page">
                <img src="/laravel/img/coin02.png" /><span><a href="#">考试</a>&nbsp;-&nbsp;<a
                    href="#">内测</a>&nbsp;-</span>&nbsp;内测
            </div>
        </div>
    <form action="{{route('ce_do')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="page ">
            <!-- 上传广告页面样式 -->
            <div class="banneradd bor">
                <!-- <div class="baTop">
                    <span>上传广告</span>
                </div> -->
                <div class="baBody">
                    <div class="bbD">
                        网站名称：<input type="text" class="input1" name="c_name" />
                    </div>
                    <div class="bbD">
                        网站网址：<input type="text" class="input1" name="c_url" />
                    </div>
                         <div class="bbD">
                        链接类型：<label>
                                    <input type="radio" name="c_lxing" value="1"  checked="checked"/>LOGO链接
                                </label> 
                                <label>
                                    <input type="radio" name="c_lxing" value="0" />文字链接
                            </label>
                    </div>

                    <div class="bbD">
                        图片LOGO：
                        <div class="bbDd">
                            <div class="bbDImg">+</div>
                            <input type="file" class="file" name="c_img" />
                            <button>上传图片</button><a class="bbDDel" href="#">删除</a>
                        </div>
                    </div>
                     <div class="bbD">
                        网站联系人：<input type="text" class="input1" name="c_man" />
                    </div>
                     <div class="bbD">
                        网站介绍：<textarea name="c_content" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="bbD">
                        是否显示：<label>
                                    <input type="radio" name="is_show" value="1" checked="checked"/>是
                                </label> 
                                <label>
                                    <input type="radio" name="is_show" value="0" />否
                            </label>
                    </div>
                  <!--   <div class="bbD">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
                            type="text" name="pai" />
                    </div> -->
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" href="#">确定</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
                </div>
            </div>
    </form>
            <!-- 上传广告页面样式end -->
        </div>
    </div>
</body>
</html>