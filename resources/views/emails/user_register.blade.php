<!DOCTYPE html>
<html lang="ja">
<style>
  h1 {
    font-size: 16px;
    color: #ff6666;
  }
  #button {
    width: 200px;
    text-align: center;
  }
  #button a {
    padding: 10px 20px;
    display: block;
    border: 1px solid #2a88bd;
    background-color: #2a88bd;
    color: #FFFFFF;
    text-decoration: none;
    box-shadow: 2px 2px 3px #55b3b9;
  }
  #button a:hover {
    background-color: #FFFFFF;
    color: #2a88bd;
  }
</style>
<body>
<h1>
  社内報公開のお知らせ
</h1>
<p>
  {{$text}}
</p>
<p id="button">
  <a href="http://ec2-3-114-206-178.ap-northeast-1.compute.amazonaws.com/posts">シンクワン社内報</a>
</p>
</body>
</html>
