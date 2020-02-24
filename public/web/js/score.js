  var Score = function(obj,option){
    var self = this ;
    this.obj = obj ;
    this.len = 3 ;
    this.eachHeight = 47;
    this.eachWidth = null;
    this.countEachImg();

    this.defaultDOM();
    this.defaultIcon = this.obj.find('.default-icon');
    this.description = this.obj.find('.score-description');
      // console.log(this.description)

    this.defaultIcon.click(function(e){
      var level = $(this).attr('score-level');
      // console.log(level)
      $(this).parents("[class^='score-']").children('.score-description').html(self.selectLevelDescript(level));
      // var _index = $(this).parents("[class^='score-']").index() - 1;
      for(var i = 0 ; i<self.len ; i++){
        if(i < level){
          var sum=2;
          sum = sum+Number(level);
          $(this).parents("[class^='score-']").find('.default-icon').eq(i).css("background-image","url('/wap/se_new/image/smile/icon_0"+sum+".png')");
        }else{
          $(this).parents("[class^='score-']").find('.default-icon').eq(i).css("background-image","url('/wap/se_new/image/smile/icon_07.png')");
        }
      }
    },
    //     function(e){
    //     var level = $(this).parent('.default-statu').attr('active-level') || 0;
    //     $(this).parents("[class^='score-']").children('.score-description').html(self.selectLevelDescript(level));
    //     var customLevel = $(this).parent('.default-statu').attr('active-level');
    //     console.log(customLevel)
    //     for(var i = 0 ; i<self.len ; i++){
    //       if(i < parseInt(customLevel)){
    //           var sum=2;
    //           sum = sum+Number(customLevel);
    //         $(this).parents("[class^='score-']").find('.default-icon').eq(i).css("background-image","url('../../../wap/se_new/image/smile/icon_0"+sum+".png')");
    //       }else{
    //         $(this).parents("[class^='score-']").find('.default-icon').eq(i).css("background-image","url('../../../wap/se_new/image/smile/icon_07.png')");
    //       }
    //     }
    // }
    ).on('click',function(e){
      e.stopPropagation();

      level = $(this).attr('score-level');
      // alert(level)
      $(this).parent('.default-statu').attr('active-level',level);
      $(this).parents("[class^='score-']").children('.score-description').html(self.selectLevelDescript(level));
      $("#tag_title").html(selectTagTitle(level));


    });
  };
   function selectTagTitle(n){
      var descriptHTML = '';
      switch(parseInt(n))
      {
          case 1:
              descriptHTML = "<ul id=\"test\" class=\"test-1\">\n" +
                              "<li id=\"c1\">态度不好</li>\n" +
                              "<li id=\"c2\">没穿工作制服</li>\n" +
                              "<li id=\"c3\">东西没弄好</li>\n" +
                              "<li id=\"c4\">没按时来</li>\n" +
                              "</ul>";
              break;
          case 2:
              descriptHTML = "<ul id=\"test\" class=\"test-1\">\n" +
                              "<li id=\"c1\">还可以</li>\n" +
                              "<li id=\"c2\">屋内没什么味道</li>\n" +
                              "<li id=\"c3\">一般般</li>\n" +
                              "<li id=\"c4\">师傅手艺还可以</li>\n" +
                              "</ul>";
              break;
          case 3:
              descriptHTML = "<ul id=\"test\" class=\"test-1\">\n" +
                              "<li id=\"c1\">非常好</li>\n" +
                              "<li id=\"c2\">对本次服务非常满意</li>\n" +
                              "<li id=\"c3\">屋内基本没什么味道了</li>\n" +
                              "<li id=\"c4\">太好了</li>\n" +
                              "<li id=\"c5\">师傅态度很好</li>\n" +
                              "</ul>";
              break;

      }
      return descriptHTML;
  }
  Score.prototype = {

    selectLevelDescript: function(n){
      var descriptHTML = '';
      switch(parseInt(n))
      {
      case 1:
        descriptHTML =  '一般';
        break;
      case 2:
        descriptHTML = '好';
        break;
      case 3:
        descriptHTML = '很好';
        break;
      // case 4:
      //   descriptHTML = '很好';
      //   break;
      // case 5:
      //   descriptHTML = '非常好';
      //   break;
      default:
        descriptHTML = '请对该产品评价';
      }
      return descriptHTML;
    },

    defaultDOM : function(){
      var _scoreChild = this.obj.children("[class^='score-']");
      var _len = _scoreChild.length;
      for(var i = 0; i< _len ; i++){
        var _defaultHTML = "<div class='default-statu' icon-type='"+_scoreChild.eq(i).attr('class')+"'></div><div class='score-description' >请对该产品评价</div>" ;
        _scoreChild.eq(i).append(_defaultHTML);          
      }

      var _default = this.obj.find('.default-statu');

      _default.html(this.eachChildrenDOM());
    },
    eachChildrenDOM : function(){
      var _MainHTML = "" ;
        for(var j = 1 ; j <= this.len ; j++){
          _MainHTML += "<span class='default-icon'  score-level="+ j +"></span>";
        };     
        return _MainHTML;  
    },
    countEachImg : function(){
      var _this_ = this ; 
      var img = new Image();
      _this_.obj.prepend('<img class="scoreHiddenImage" style="display:none" src="" alt="">');
      img.src = '/wap/se_new/image/icon.png';
      $(img).on('load error',function(){ 
        $('img.scoreHiddenImage').attr('src',img.src);
        each = $('img').width() / 2.8;
        _this_.eachWidth = each;    
      })
    },
  };    

  $.fn.extend({
    score:function(){
      new Score(this)
    }
  })
