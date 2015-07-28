<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	public function _initialize() {
  	  	header("Content-Type:text/html; charset=utf-8");
    		if($_COOKIE['zadi']!='1' && $_POST['retu']!='1' ){
    			$this->display('login');
    			exit;
    			}
    	}
    	
    	public function login(){			//登录模块
    											
					if($_GET['anlogin']==1){
							setcookie("zadi", 0);
							$url="<script language='javascript'>location.href='__URL__';</script>";
   						$this->assign('url',$url);
							$this->display('tz');
							exit;
						}    			
    			$login=M("Admin");
    			$data=$login->select();
    			$i=($_POST['name']==$data[0]['aname']);
    			$j=($data[0]['apwd']==md5($_POST['pwd']));
    			$y=(session('verify') == md5($_POST['verify']));
					if($i && $j && $y){
						setcookie("zadi", 1);
						echo "<script language='javascript'>alert('登录成功');</script>";
						$url="<script>location.href='".$_POST['myurl']."';</script>"; 
						$this->assign('url',$url);
						$this->display('tz');
						
					}else{
							if(!$i)
								echo "<script language='javascript'>alert('管理帐号不正确');</script>";
							if(!$j)
								echo "<script language='javascript'>alert('密码输入错误，可能是否打开了大小写');</script>";		
							if(!$y)
								echo "<script language='javascript'>alert('验证码输入错误');</script>";	
							echo "<script>location.href='".$_POST['myurl']."';</script>"; 
	
					}
					
    		}
    	
    public function index(){		//主模块。主页
       
			
				$ateic=M("Theme");
			
				$theme=$ateic->select();
				$count=count($theme);
				$this->assign('count',$count);

				$countnum=0;
				$dq=0;
				for($i=0;$i<$count;$i++){
					$ctnum+= $theme[$i]['count'];
					if($theme[$i]['zt']=='0')
						$dq++;
				}
				
				$this->assign('dq',$dq);
				$this->assign('ct',$ctnum);
				
				$this->display();
    }
    
   public function users(){		//用户列表模块
    	  
			
				$ateic=M("Users");
		  		

	            $users=$ateic->select();
						
				$this->assign('users',$users);
    		
    		$this->display();
  	
   	}	
	
	
    public function listr(){		//列表模块
    	  
			
				$ateic=M("Theme");
		  		
    			$bh='1';
    		    		  
    		  if(isset($_GET['bh']))
    		 		 $bh=$_GET['bh'];	
 
				switch ($bh) {
    			case '1':   			
        			$theme=$ateic->select();		//得到所有投票
        			$this->assign('title',"所有投票");																																					
       				break;
    			case '2':
    					$zt['zt']=0;
    					$theme=$ateic->where($zt)->select();
        			$this->assign('title',"正在进行的投票");		
        			break;
    			case '3':
    					$zt['zt']=2;
       			 	$theme=$ateic->where($zt)->select();
       			 	$this->assign('title',"待完善的投票");			
        			break;
        	    case '4':
        			$zt['zt']=1;
       			 	$theme=$ateic->where($zt)->select();		
        			$this->assign('title',"已经结束的投票");		
        			break;
				}
	
    		/*if(count($theme)==0)				//传递是否有正在投票的主题
						$this->assign('jgbj',0);
				else
						$this->assign('jgbj',1);	*/
						
				$this->assign('theme',$theme);


    //    import('ORG.Util.Page');// 导入分页类
   //     $count      = $ateic->where()->count();// 查询满足要求的总记录数 $map表示查询条件
   //     $Page       = new Page($count,2);// 实例化分页类 传入总记录数
    //    $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询
   //     $list = $ateic->where()->limit($Page->firstRow.','.$Page->listRows)->select();
   //     $this->assign('list',$list);// 赋值数据集
   //     $this->assign('page',$show);// 赋值分页输出







    		
    		$this->display();
  	
   	}


    public function listrx(){		//列表模块

        $bh=$_GET['tid'];



        $User = M("Vote");

        $condition = new stdClass();
        $condition->tid= $bh;

        $theme=$User->where($condition)->select();


        $this->assign('theme',$theme);

        $this->display();


    }

    public function addx1(){

        date_default_timezone_set(PRC);

        $rules = array(
            array('name','require','主题不能为空！'), //默认情况下用正则进行验证
            array('name','','该主题已经存在，请稍作修改',0,'unique',1), // 在新增的时候验证name字段是否唯一
            //array('fqname','require','发起者姓名不能为空'), //默认情况下用正则进行验证
           // array('endtime','require','请选择您的结束时间'), //默认情况下用正则进行验证

        );
        $id=$_POST['tid'];
        $data['name']=$_POST['name'];
        $data['tid']=$id;
        //$data['choice']=$_POST['choice'];
        $data['num']=$_POST['num'];
        $data['ztx']=$_POST['ztx'];
        $data['vcontent']=$_POST['vcontent'];
        $the = M("Vote"); // 实例化User对象
        if($the->validate($rules)->create($data)){
            $tid=$the->add();

            echo "<script language='javascript'>alert('成功');</script>";
            $url="<script>location.href='__URL__/listrx/tid/$id';</script>";
            $this->assign('url',$url);
            $this->display('tz');

        }else{

            echo "<script language='javascript'>alert('".$the->getError()."');window.close();</script>";
            exit;
        }
        /*以下是测试信息
        $theme=$the->select();
       dump($theme);
       dump($_POST);*/

        $this->display();
    }

public function upx(){

     $id=$_GET[id];
     $js[id]=$id;

    $vo=M('Vote');
    $pd=$vo->where($js)->select();

    $this->assign('theme',$pd[0]);
    $this->display();
}

public function upx1(){
    $tid=$_POST['tid'];
    $id=$_POST['id'];
    $rules = array(
        array('name','require','不能为空！'), //默认情况下用正则进行验证
        //array('fqname','require','发起者姓名不能为空'), //默认情况下用正则进行验证
        //array('endtime','require','请选择您的结束时间'), //默认情况下用正则进行验证
    );

    $tjpd['id']=$id;
    $data['name']=$_POST['name'];
    $data['ztx']=$_POST['ztx'];
    $data['num']=$_POST['num'];
    $data['vcontent']=$_POST['vcontent'];
    $the = M("Vote"); // 实例化User对象
    if($the->validate($rules)->create($data)){
        $zt=$the->where($tjpd)->save($data);
        //dump($zt);
        if($zt==1){

            echo "<script>opener.location.reload();</script>";			//刷新父页面

            echo "<script language='javascript'>alert('修改信息成功');</script>";

            $url="<script>location.href='__URL__/listrx/tid/".$tid."';</script>";
            $this->assign('url',$url);
            $this->display('tz');
            exit;
            //echo "<script>location.href='opti?tid=".$tid."';</script>";
        }else{
            echo "<script language='javascript'>alert('您的数据错误或者没做修改');</script>";

            $url="<script>location.href='__URL__/upx/id/".$id."';</script>";
            $this->assign('url',$url);
            $this->display('tz');
            exit;

        }
    }else{
        echo "<script language='javascript'>alert('".$the->getError()."');window.close();</script>";
        exit;
    }
}





    public function de(){
        $title=M('Vote');
        $tj['id']=$_GET['id'];

        $jg=$title->where($tj)->limit('1')->delete();


        if($jg==1){
            //echo "<script>opener.location.reload();</script>";			//刷新父页面
            $url="<script language='javascript'>alert('成功删除');location.href='__URL__/listrx';</script>";
            $this->assign('url',$url);
            $this->display('tz');
            exit;
        }else{
            echo "<script language='javascript'>alert('数据错误'); window.close();</script>";
            exit;

        }
    }

    public function xvote(){

       $id=$_GET[id];
       $tid=$_GET[tid];

     if($id != null){
       $xx[xid]=$id;
        $ip=M('Ip');

        $pd=$ip->where($xx)->select();


         $this->assign('theme1',$pd[0]);
        $this->assign('theme',$pd);
     }

        if($tid != null) {
            $vv[vid] = $tid;
            $ip = M('Ip');

            $pd = $ip->where($vv)->select();

            $this->assign('theme', $pd);

        }

            $this->display('xvote');
    }


   public function liuyan(){		//留言列表模块
    	  
			$theme=M("Theme");

           $liu=$theme->where()->select();
           $this->assign('liu',$liu);
    		
    		$this->display('liuyan');
  	
   	}



	   public function liu(){		//活动参加列表模块
    	  
			$tid=$_GET['tid'];

           $vv[tid]=$tid;

          $the=M(Theme);
           $yan=M(Liuyan);
        $vliu=$yan->where($vv)->select();
           $theme=$the->where($vv)->select();

           $this->assign('vliu',$vliu);
           $this->assign('theme',$theme[0]);
    		$this->display();
  	
   	}

    public function xliu(){


     $id=$_GET['id'];
     $dd[id]=$id;
     $liu=M("Liuyan");

   $xliu=$liu->where($dd)->select();

      $this->assign('xliu',$xliu[0]);

        $this->display();

    }
  public function tliu(){


  $id=$_POST[id];
  $tid=$_POST[tid];
      $tt[id]=$id;

      $data['xs']=$_POST['xs'];
      $liu=M("Liuyan");



      $zt=$liu->where($tt)->save($data);

      if($zt==1){

          echo "<script>opener.location.reload();</script>";			//刷新父页面

          echo "<script language='javascript'>alert('修改信息成功');</script>";

          $url="<script>location.href='__URL__/liu/tid/".$tid."';</script>";
          $this->assign('url',$url);
          $this->display('tz');
          exit;
          //echo "<script>location.href='opti?tid=".$tid."';</script>";
      }

  }



   	public function add(){			//增加投票模块
   		date_default_timezone_set(PRC);
   		
   		$rules = array(
		   	array('title','require','主题不能为空！'), //默认情况下用正则进行验证
    		array('title','','该主题已经存在，请稍作修改',0,'unique',1), // 在新增的时候验证name字段是否唯一
		    //array('fqname','require','发起者姓名不能为空'), //默认情况下用正则进行验证
		    array('endtime','require','请选择您的结束时间'), //默认情况下用正则进行验证
			
			);
			
			$data['title']=$_POST['title'];
			//$data['fqname']=$_POST['fqname'];
			//$data['choice']=$_POST['choice'];
			//$data['newvotes']=$_POST['newvotes'];
			$data['startime']=$_POST['startime'];
			$data['endtime']=$_POST['endtime'];
           $data['startime1']=$_POST['startime1'];
           $data['endtime1']=$_POST['endtime1'];
			$data['votegy']=$_POST['votegy'];
			$data['votesm']=$_POST['votesm'];

            $data['img']=$_POST['img'];
           $data['vote']=$_POST['vote'];
           $data['vote_day']=$_POST['vote_day'];
           $data['vote_item']=$_POST['vote_item'];
           $data['login']=$_POST['login'];
           $data['liuyan']=$_POST['liuyan'];
			$data['zt']=$_POST['zt'];
            $data['hzt']=$_POST['hzt'];
			$data['count']=0;
			$data['content']=$_POST['content'];
			$the = M("Theme"); // 实例化User对象
			if($the->validate($rules)->create($data)){
					$tid=$the->add();
					
					echo "<script language='javascript'>alert('发起投票成功');</script>";
					$url="<script>location.href='__URL__/listr';</script>"; 
					$this->assign('url',$url);
					$this->display('tz');
							
			}else{

				echo "<script language='javascript'>alert('".$the->getError()."');window.close();</script>";
				exit;
				}
			/*以下是测试信息
			$theme=$the->select();
   		dump($theme);
   		dump($_POST);*/
   	}
   	
   	public function opti(){			//详情 及 修改模块
   		
   			
   			//dump($_GET);
  			
   		$id=$_GET['tid'];		//获取传来的主题id
    		
    	$theme=M('Theme'); 	//投票主题数据库
		$opt=M('Option');		//投票项
    		
    	$tj['tid']=$id;													//判断传递过来的id是否存在
    	$pd=$theme->where($tj)->select();	
    	
    	if(count($pd)==0 or count($pd)!=1){
    		echo "<script language='javascript'>alert('异常数据错误！');window.close();</script>";
   			exit;
    	}else{
    		$where['extend']=$id;
				$date=$opt->where($where)->select();
    		//dump($date);  
    		
    		$counum=0;
    		for ($i = 0; $i <count($date); $i++)			//算出总投票数
    			$counum += $date[$i]['num'];
				
				$this->assign('counum',$counum);
    		
    		
   			$this->assign('counxx',count($date));
    		$this->assign('theme',$pd[0]);
    		$this->assign('date',$date);
    		
    		if($pd[0]['choice']==0)		//判断该主题是单投还是多投的方式
    				$an="单选";
    		else
    				$an="多选";
    		$this->assign('an',$an);
    	}
    	
   			$this->display('opti');
			
   		
   	}
   	
   	public function xiugai(){			//修改操作
   		 
   		
   		if(isset($_POST['tid'])){
   				$tid=$_POST['tid'];
   	   		$rules = array(
			   		array('title','require','主题不能为空！'), //默认情况下用正则进行验证
		  	  	//array('fqname','require','发起者姓名不能为空'), //默认情况下用正则进行验证
		    		array('endtime','require','请选择您的结束时间'), //默认情况下用正则进行验证
					);
						
						$tjpd['tid']=$tid;
						$data['title']=$_POST['title'];
					  //$data['fqname']=$_POST['fqname'];
						//$data['choice']=$_POST['choice'];
						$data['zt']=$_POST['zt'];
                        $data['hzt']=$_POST['hzt'];
						$data['img']=$_POST['img'];
						$data['startime']=$_POST['startime'];
						$data['endtime']=$_POST['endtime'];
                        $data['startime1']=$_POST['startime1'];
                        $data['endtime1']=$_POST['endtime1'];
			            $data['votegy']=$_POST['votegy'];
			            $data['votesm']=$_POST['votesm'];
			            $data['content']=$_POST['content'];
                        $data['vote']=$_POST['vote'];
                        $data['vote_day']=$_POST['vote_day'];
                        $data['vote_item']=$_POST['vote_item'];
                        $data['login']=$_POST['login'];
                        $data['liuyan']=$_POST['liuyan'];
					    $the = M("Theme"); // 实例化User对象
					if($the->validate($rules)->create($data)){
							$zt=$the->where($tjpd)->save($data);
							//dump($zt);
							if($zt==1){
								
								echo "<script>opener.location.reload();</script>";			//刷新父页面
								
								echo "<script language='javascript'>alert('修改信息成功');</script>";

								$url="<script>location.href='__URL__/listr';</script>"; 
					                        $this->assign('url',$url);
					                        $this->display('tz');
								exit;
								//echo "<script>location.href='opti?tid=".$tid."';</script>"; 
							}else{
								echo "<script language='javascript'>alert('您的数据错误或者没做修改');</script>";

								$url="<script>location.href='__URL__/opti/tid/".$tid."';</script>"; 
					                        $this->assign('url',$url);
					                        $this->display('tz');
								exit;
								
							}	
					}else{
						echo "<script language='javascript'>alert('".$the->getError()."');window.close();</script>";
						exit;
					}
   			
   		}else{
   			echo "<script language='javascript'>alert('数据异常错误');window.close();</script>";
				exit;
   		}

   	}

		//上传图片回调
		public function uploadify(){

			$photo = M('Theme');
			$targetFolder = './Public/Update/theme/'; //设置上传目录
			if (!empty($_FILES)) {
				$tempFile = $_FILES['Filedata']['tmp_name'];

				$extend = explode("." , $_FILES['Filedata']['name']);
				$va=count($extend)-1;

				$path = time().mt_rand(10000,99999).".".$extend[$va];
				$targetFile =$targetFolder. '/' . $path; //$_FILES['Filedata']['name'];//上传后的图片路径
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png'); //允许的文件后缀
				$fileParts = pathinfo($_FILES['Filedata']['name']);

				if (in_array($fileParts['extension'],$fileTypes)) {
					move_uploaded_file($tempFile,iconv("UTF-8","gb2312", $targetFile));
					//$data['originalname'] = $_FILES['Filedata']['name'];
					//$data['type'] = $_GET['tid'];
					//$data['img'] = $targetFile;
					//$photo->add($data);
					echo $path;//上传成功后返回给前端的数据
				} else {
					echo '不支持的文件类型';
				}
			}
		}




    public function del(){   //删除图片
        if($_POST['name']!=""){
            $info = $_POST['name'];
            $a = explode(".",$info);
            unlink('./'.$a[0].'_t100'.'.'.$a[1]);
            unlink('./'.$a[0].'_t200'.'.'.$a[1]);
            if(unlink('./'.$info)){
                $this->success("删除成功");
            }
            else
                $this->error("unlink fail");
        }
        else
            $this->error("info is gap");
    }



   	public function thed(){
   		
   		
   		if(isset($_GET['bh'])){
   				$bh=$_GET['bh'];
   				
   				$title=M('Theme'); //投票主题数据库
   				$opt=M('Option');		//投票项数据库
   				
   				switch($bh){
   						
   						case '1':
   								$tj['tid']=$_GET['tid'];

									$jg=$title->where($tj)->setInc('zt',1);
									if($jg==1){
												//echo "<script>opener.location.reload();</script>";			//刷新父页面
												$url="<script language='javascript'>alert('主题成功结束');location.href='__URL__/listr';</script>";
												$this->assign('url',$url);
												$this->display('tz');
												exit;
									}else{
											echo "<script language='javascript'>alert('修改错误');window.close();</script>";
											exit;
								}	
   											
   							
   								break;
   						case '2':
   						
   								$tj['tid']=$_GET['tid'];
									$ope['extend']=$_GET['tid'];
							
									$jg=$title->where($tj)->limit('1')->delete();
									$opjg=$opt->where($ope)->delete();
								
									if($jg==1){
												//echo "<script>opener.location.reload();</script>";			//刷新父页面
												$url="<script language='javascript'>alert('主题成功删除');location.href='__URL__/listr';</script>";
												$this->assign('url',$url);
												$this->display('tz');
												exit;
									}else{
											echo "<script language='javascript'>alert('数据错误'); window.close();</script>";
											exit;
																							  						
   								}
   								break;
   								
   						case '3':
   						
   								$thtj['tid']=$_GET['tid'];
   								$optj['xid']=$_GET['xid'];
   								
   								$jg=$opt->where($optj)->limit('1')->delete();
   								
   								if($jg==1){
   								
   										$thjg=$title->where($thtj)->setDec('opnum',1);
   								
   										$theme=$title->where($thtj)->select();
   								
   										if($theme[0]['opnum']==0){			
   												$update['zt']=2;
   												$title->where($thtj)->save($update);
   										}
   										
   											$url="<script language='javascript'>alert('投票项删除成功');location.href='__URL__/opti/tid/".$_GET['tid']."';</script>";
   											$this->assign('url',$url);
												$this->display('tz');
												exit;
   										
   								}else{
   										$url="<script language='javascript'>alert('数据项错误'); location.href='__URL__/opti/tid/".$_GET['tid']."';</script>";
   										$this->assign('url',$url);
												$this->display('tz');
											exit;
   										
   								}

   						 						
   								break;
   						case '4':
   								$tj['extend']=$_GET['tid'];
   								$data['num']=0;
									$jg=$opt->where($tj)->save($data);
									if(!$jg==0){
												//echo "<script>opener.location.reload();</script>";			//刷新父页面
												$url="<script language='javascript'>alert('票数清空成功');location.href='__URL__/opti/tid/".$_GET['tid']."';</script>";
												$this->assign('url',$url);
												$this->display('tz');
												exit;
									}else{
											$url="<script language='javascript'>alert('票数已经为空，或者没有清空项'); location.href='__URL__/opti/tid/".$_GET['tid']."';</script>";
											
											$this->assign('url',$url);
												$this->display('tz');
											exit;
																							  						
   								}   						
   								break;
   								
   						case '5':
   								$thtj['tid']=$_POST['tid'];
   								   								
   								$rules = array(
   										array('cho','require','选项不能为空！'), //默认情况下用正则进行验证
			   							array('cho','','该选项已经存在！',0,'unique',1), 
									);
						
									$data['cho']=$_POST['cho'];
					 			 	$data['extend']=$_POST['tid'];
									$data['choice']=$_POST['choice'];
									$data['num']=0;
   								
   								if($opt->validate($rules)->create($data)){
												$tid=$opt->add();
												$zt['zt']=0;
												
												$title->where($thtj)->setInc('opnum',1);
												$title->where($thtj)->save($zt);
												
												echo "<script>opener.location.reload();</script>";	
												echo "<script language='javascript'>alert('选项添加成功');window.close()</script>";
												exit;												
							
									}else{

										echo "<script language='javascript'>alert('".$opt->getError()."');window.close();</script>";
										exit;
									} 						
   								break;	

   				}
   		}else{
   				echo "<script language='javascript'>alert('数据异常错误');window.close();</script>";
					exit;
   		}
   		
   	}
		
		public function sett(){
			
			if(isset($_GET['bh'])){
   				$bh=$_GET['bh'];

   				
   				$admin=M('Admin'); //管理表
					$data=$admin->where("aname='admin'")->select();
			
   				switch($bh){
   						case '1':	
   						   		if(strlen($_POST['pwd'])<5){
   												echo "<script language='javascript'>alert('密码太短，请输入6位以上的密码');window.close();</script>";
   												exit;
   									}
   						
										$i1=(md5($_POST['oldpwd'])==$data[0]['apwd']);
										$i2=$_POST['pwd']==$_POST['repwd'];				
										if($i1 && $i2){
											$data[0]['apwd']=md5($_POST['pwd']);
											$zt=$admin->save($data[0]);
											
											if(!$zt==0){
								
												echo "<script>opener.location.reload();</script>";			//刷新父页面
												echo "<script language='javascript'>alert('密码信息成功');window.close();</script>";
												exit; 
											}else{
													echo "<script language='javascript'>alert('您的数据错误或者没做修改');window.close();</script>";
													exit;
											}	
								}else{
										if(!$i1)
												echo "<script language='javascript'>alert('密码输入错误');window.close();</script>";
										if(!$i2)
												echo "<script language='javascript'>alert('两次密码不一样');window.close();</script>";
								}
   								
					
   								break;
   						case '2':
   										$data[0]['gonggao']=$_POST['gonggao'];
   										$zt=$admin->save($data[0]);
   										if($zt==1){
												echo "<script>opener.location.reload();</script>";			//刷新父页面
												echo "<script language='javascript'>alert('网站公告信息成功');window.close();</script>";
												exit; 
											}else{
													echo "<script language='javascript'>alert('您的数据错误或者没做修改');window.close();</script>";
													exit;
											}
					
									break;
							case '3':
										
									break;
					}
			}else{
						echo "<script language='javascript'>alert('数据异常错误');window.close();</script>";
						exit;		
			}
   	}
   	
}