<?php
class IndexAction extends Action {
	
		public $title;
		public $opt;
		public $user;
		public $ucent;
		public $vote;
		
		public function _initialize(){
			header("Content-Type:text/html; charset=utf-8");		//编码调整
			date_default_timezone_set(PRC);   //时间时区调整
			
				$this->title=M('Theme'); //投票主题数据库
				$this->opt=M('Option');	//投票项数据库
				$this->user=M('Users');			//用户登录表
				$this->ucent=M('Ucenter');		//用户信息表
				$this->vote=M('Vote');		//tp 
				 
				 if($_COOKIE['userid']==0){
        		$this->assign('userbj',0);
        		$this->assign("uname","游客");
        }else{  
        				$whe['uid']=$_COOKIE['userid'];
        				$where['userid']=$_COOKIE['userid'];
        				$data=$this->user->where($whe)->limit(1)->select();
        				$uc=$this->ucent->where($where)->limit(1)->select();
        	
        		$this->assign('userbj',1); 		
        		$this->assign('ucent',array_merge($data[0],$uc[0]));
        				//用户中心按钮功能
        }	
				
		}	
		
    public function index(){
				$zt['zt']='0';		//投票状态为‘0’ 即正在投票的主题
				
				$zuixin=$this->title->where($zt)->order('tid desc')->limit(5)->select();	//投票中 最后发起的5条投票	
				$this->assign('zuixin',$zuixin);
				//dump($zuixin);
				
				$remen=$this->title->where($zt)->order('count desc')->limit(5)->select();	//投票中 次数最多的5条投票	
				$this->assign('remen',$remen);
				//dump($remen);
			
				
				$js['zt']='1';										//投票状态为‘1’ 即已经结束的投票项
				$endremen=$this->title->where($js)->order('count desc')->limit(5)->select();
				$this->assign('endremen',$endremen);
				//dump($endremen);					
				$this->display();

    }
   
    public function tp(){
  	
			if(isset($_POST['aa'])){		
						$tj['tid']=$_POST['tid'];
						//dump($tj);
						
						if(in_array($tj['tid'],$_SESSION['name'])){	
							$this->ajaxReturn(1,"您已经给该主题投过票了,请下次再来吧",0);
							exit;	
						}

						$data=$_SESSION['name'];
						$data[]=$tj['tid'];
						session('name',$data);						//记录防止刷票
						
						$this->title->where($tj)->setInc('count',1);

						foreach($_POST['aa'] as $val){				//考虑到多选情况 用循环 增加票数
								$where['xid']=$val;
								$this->opt->where($where)->setInc('num',1);	
						}
						//这里处理用户积分增加等功能
						
						$this->ajaxReturn(1,"投票成功，感谢您的参与",1);

			}else{
					$this->ajaxReturn(1,"您没有选择投票对象",0);
					//echo "<script language='javascript'>alert('您没有选择投票对象！');</script>";
					//echo "<script>location.href='".$_POST['myurl']."';</script>";
   				//exit;
			}
	
    }
    




    public function show(){
    	
   	
    							$id=$_GET['tid'];		//获取传来的主题id
    							$tj['tid']=$id;													//判断传递过来的id是否存在
    							$pd=$this->title->where($tj)->select();
    							if(count($pd)==0 or count($pd)!=1){
    										echo "<script language='javascript'>alert('异常数据错误！');window.close();</script>";
   											exit;
    							}else{
    								$where['extend']=$id;
										$date=$this->opt->where($where)->select();
    								//dump($date);  
    		
    								$count=0;
										foreach($date as $key=>$val)			//算出总投票数
												$count += $val['num'];
										
										$this->assign('count',$count);
    								$this->assign('theme',$pd[0]);
    								$this->assign('date',$date);
    		
    								if($pd[0]['choice']==0)		//判断该主题是单投还是多投的方式
    										$an="radio";
    								else
    										$an="checkbox";
    								$this->assign('an',$an);
    							}
    							//dump($pd[0]);
    							if($pd[0]['zt']=='0')					//判断该主题是否结束
											$this->assign('tp',0);
									else
											$this->assign('tp',1);
    		
    	
    	$this->display();
    	
    }
    
	public function vote(){
		
		       					$id=$_GET['tid'];		//获取传来的主题id
    							$tj['tid']=$id;													//判断传递过来的id是否存在
    							$pd=$this->title->where($tj)->select();
    							if(count($pd)==0 or count($pd)!=1){
    										echo "<script language='javascript'>alert('异常数据错误！');window.close();</script>";
   											exit;
    							}else{
    								$where['extend']=$id;
										$date=$this->opt->where($where)->select();
    								//dump($date);  
    		
    								$count=0;
										foreach($date as $key=>$val)			//算出总投票数
												$count += $val['num'];
										
								    $this->assign('count',$count);
    								$this->assign('theme',$pd[0]);
    								$this->assign('date',$date);
    		
    								if($pd[0]['choice']==0)		//判断该主题是单投还是多投的方式
    										$an="radio";
    								else
    										$an="checkbox";
    								$this->assign('an',$an);
    							}
    							//dump($pd[0]);
    							if($pd[0]['zt']=='0')					//判断该主题是否结束
											$this->assign('tp',0);
									else
											$this->assign('tp',1);
										
										

	$this->display();

	}
	
public function addvote1(){
	
	   			$rules = array(
		 	  	array('name','require','不能为空！'), //默认情况下用正则进行验证
    			//array('title','','该主题已经存在，请稍作修改',0,'unique',1), // 在新增的时候验证name字段是否唯一
		  	 // array('fqname','require','发起者姓名不能为空'), //默认情况下用正则进行验证
		  	 // array('endtime','require','请选择您的结束时间'), //默认情况下用正则进行验证
			
				);
			
			$data['tid']=$_POST['tid'];							
			$data['name']=$_POST['name'];
			$data['age']=$_POST['age'];
			$data['xb']=$_POST['xb'];
			$data['phon']=$_POST['phon'];
			$data['img']=$_POST['img'];
			$data['vcontent']=$_POST['vcontent'];
            $data['ztx']=$_POST['ztx'];
			$the = M("Vote"); // 实例化User对象
			if($the->validate($rules)->create($data)){
					$tid=$the->add();
					
					echo "<script language='javascript'>alert('参加成功');</script>";
					$url="<script>location.href='__URL__/listr/bh/1';</script>"; 
					$this->assign('url',$url);
					$this->display('tz');
							
			}else{

					$this->assign('error',$the->getError());
				
				}
	
	
	
}	
	

public function tpvote(){
	
	     		//dump($_GET);
    $bh=$_GET['tid'];
    

			
        $User = M("Vote");
        $User1 = M("Theme");

		$condition = new stdClass(); 
		$condition->tid= $bh; 
		
		$theme=$User->where($condition)->select();
        $theme1=$User1->where($condition)->select();
				
		$this->assign('theme',$theme);
        $this->assign('theme1',$theme1[0]);


    $this->display('tpvote');

	
}

    public function showv(){

        //dump($_GET);
       $id=$_GET['id'];



        $User = M("Vote");
        $liuyan = M("Liuyan");

        $condition = new stdClass();
        $condition->id= $id;

        $theme=$User->where($condition)->select();


        $condition1 = new stdClass();
        $condition1->vid= $id;

        $theme1=$liuyan->where($condition1)->select();


        $this->assign('theme',$theme[0]);
        $this->assign('theme1',$theme1);


        $this->display();


    }

    public function liuyan()
    {

       $tid=$_POST['tid'];

        $t = M("Theme");
        $r=$t->where("tid='$tid'")->find();


        //判断 这个活动是否需要登录

        if($r['liuyan']==0) {

            if ($_COOKIE['userid'] == 0) {

                echo "<script language='javascript'>alert('请先登录在留言');</script>";
                $url = "<script>location.href='__URL__/login';</script>";
                $this->assign('url', $url);
                $this->display('tz');
              exit;
            }
        }








        $vid=$_POST['vid'];
        $content=$_POST['content'];
        $name1=$_POST[name];
        $ip = get_client_ip();
        $time=date('Y-m-d H:i:s');

        $liuyan = M ("Liuyan");



        if ($_COOKIE['userid'] != 0) {

            $name=$_COOKIE['uname'];
            $data[uname]=$name;

        }
        $data['ip']=$ip;
        $data['time']=$time;
        $data['vid']=$vid;
        $data['content']=$content;

        $data['tid']=$tid;
        $data['name']=$name1;
        if($lastInsId = $liuyan->add($data)){
            echo "<script language='javascript'>alert('留言成功');</script>";
            $url="<script>location.href='__URL__/showv/id/".$vid."';</script>";
            $this->assign('url',$url);
            $this->display('tz');
        } else {
            $this->error('数据写入错误！');
        }


    }



    public function tpv(){


        //dump($_GET);
       $tid=$_POST['tid'];
        $id=$_POST['id'];
     $ip = get_client_ip();
     $time=date('Y-m-d H:i:s');
     $time1=date('Y-m-d');
        $t = M("Theme");
        $v = M("Ip");

     $r=$t->where("tid='$tid'")->find();

//判断 这个活动是否需要登录

if($r['login']==0){

    if($_COOKIE['userid']==0){

        echo "<script language='javascript'>alert('请先登录在投票');</script>";
        $this->display('login');
        exit;
    }else{

        $this->display();
    exit;
    }

}


        if($id==null){
            echo "<script language='javascript'>alert('未选择投票项');history.go(-1);</script>";
            exit;
        }


//判断 活动投票时间


        if($time < $r['startime']){


            echo "<script language='javascript'>alert('活动投票未开始');history.go(-1);</script>";

            exit;
        }


//判断 每个用户每个活动总的投票数 是否超过
        $condition['ip'] = $ip;
        $condition['vid'] = $tid;

      $count1=$v->where($condition)->count();

     if($r['vote']!=0){

          if($count1 >= $r['vote']){


         echo "<script language='javascript'>alert('超过总的投票数');history.go(-1);</script>";

        exit;
          }

     }


 //判断 每个用户每个活动每天的投票数  是否超过
        $condition1['ip']=$ip;
        $condition1['vid']=$tid;
        $condition1['time1']=$time1;
        $count1=$v->where($condition1)->count();

        if($r['vote_day']!=0){

            if($count1 >= $r['vote_day']){


                echo "<script language='javascript'>alert('超过每天的投票数');history.go(-1);</script>";
                exit;
            }

        }


//判断 制每个选项每天获得的票数  是否超过
        $condition2['ip']=$ip;
        $condition2['vid']=$tid;
        $condition2['xid']=$id;
        $condition2['time1']=$time1;
        $count2=$v->where($condition2)->count();

        if($r['vote_item']!=0){

            if($count2 >= $r['vote_item']){


                echo "<script language='javascript'>alert('超过每天获得的投票数');history.go(-1);</script>";
                exit;
            }

        }



        $m=M('Vote');
        $data1['id']=$id;
        $m->where($data1)->setInc('num');



        $data['ip']=$ip;
        $data['time']=$time;
        $data['time1']=$time1;
        $data['vid']=$tid;
        $data['xid']=$id;

        if($lastInsId = $v->add($data)){
            echo "<script language='javascript'>alert('投票成功');</script>";
            $url="<script>location.href='__URL__/tpvote/tid/".$tid."';</script>";
            $this->assign('url',$url);
            $this->display('tz');
        } else {
            $this->error('数据写入错误！');
        }

    }


    public function listr(){
    		//dump($_GET);
    		$bh=$_GET['bh'];		
				$zt['zt']='0';
				
				switch ($bh) {
    			case '1':
        			$theme=$this->title->where($zt)->select();		//得到所有正在进行的投票
        			$this->assign('title',"投票中的列表");																																					
       				break;
    			case '2':
    					$like=$_POST['keyword'];
    					$like='%'.$like.'%';
    					$map['title'] = array('like',$like);
    					$theme=$this->title->where($map)->select();

        			$this->assign('title',"查找结果");
        			break;
    			case '3':
       			 	$theme=$this->title->where($zt)->order('tid desc')->select();
       			 	$this->assign('title',"最新投票列表");
        			break;
        	case '4':
       			 	$theme=$this->title->where($zt)->order('count desc')->select();
        			$this->assign('title',"热门投票列表");
        			break;
        	case '5':
        			$zt['zt']='1';
       			 	$theme=$this->title->where($zt)->select();
       			 	$this->assign('title',"已经结束的投票");
        			break;
				}
	
    		if(count($theme)==0)				//传递是否有正在投票的主题
						$this->assign('jgbj',0);
				else
						$this->assign('jgbj',1);	
						
				$this->assign('theme',$theme);
    		
    		$this->display();
    }
    
    public function addenroll(){

    		
    		$rules = array(
		   		array('uname','require','注册邮箱不能为空'), //默认情况下用正则进行验证
		   		array('upwd','require','登录密码不能为空'), 
		   		array('reupwd','require','请重复密码'), 
		   		array('verify','require','请正确填写验证码！'),		
		   		array('uname','email','请填写正确的邮箱格式！'), 	  		
    			array('uname','','该邮箱已经被注册，请更改一个邮箱',0,'unique',1), // 在新增的时候验证  字段是否唯一
    			array('upwd','6,30','密码长度不够长',1,'length'), 
    			array('reupwd','upwd','两次输入的密码不一致',0,'confirm'),   		
				);					
				$ucrules = array(
							array('name','','该用户名称已经存在，请修改',0,'unique',1), // 在新增的时候验证name字段是否唯一		 							
							array('name','require','您的名字不能为空'), 
  		
				);
				
				$data=array(
					'uname'=>$_POST['uemail'],
					'upwd'=>$_POST['upwd'],
					'reupwd'=>$_POST['reupwd'],
					'utime'=>date("Y-m-d H:i:s"),
					'uip'=>$_SERVER["REMOTE_ADDR"],				
					'verify'=>$_POST['verify'],
				);
			
				
				
				$i=($this->user->validate($rules)->create($data));
				$y=(session('verify') == md5($_POST['verify']));
				
				if($i && $y){
							$data['upwd']=md5($data['upwd']);
							$utid=$user->add($data);
							$ucdata=array(
									'userid'=>$utid,
									'name'=>$_POST['name'],
									'phon'=>$_POST['phon'],
									'sex'=>$_POST['sex'],
									'addr'=>$_POST['addr'],
									'workr'=>$_POST['workr'],	
							);		
							$j=($this->ucent->validate($icrules)->create($ucdata));
							if($j && $utid!=0){
									$this->ucent->add();
									
									setcookie("userid", $data[0]['uid']);
									setcookie("uname",$data[0]['uname']);
									setcookie("utime",$data[0]['utime']);
									//$this->assign('error',"注册成功，显示用户中心");
									$url="<script>location.href='__URL__/login';</script>";
									$this->assign('url',$url);
									$this->display('tz');
									exit;
							}else
									$this->assign('error',"用户注册失败");
				}else{	
					//echo "<script language='javascript'>alert('".$the->getError()."');window.close();</script>";
				if(!$i)
					$this->assign('error',$user->getError());
					if(!$y)
						$this->assign('error',"验证码输入错误");
				}
			$this->display('enroll');	
    	
    	}
    	
    	public function login(){
    		    		
    		
    			if($_GET['anlogin']==1){
							setcookie("userid", 0);
							$url="<script>location.href='__URL__';</script>";
							$this->assign('url',$url);
							$this->display('tz');
							exit;
					}else{
						if($_POST['retu']==1)	{	
    			
    					$dlpd['uname']=$_POST['uname'];
    					$data=$this->user->where($dlpd)->limit(1)->select();
    					$i=(count($data)==1);
							$j=($data[0]['upwd']=md5($_POST['upwd']));				
							if($i && $j){

                                    setcookie("uname",$data[0]['uname']);
									setcookie("userid", $data[0]['uid']);

									$url="<script>location.href='__URL__';</script>"; 
									$this->assign('url',$url);
									$this->display('tz');
									exit;
							}else{
								if(!$i)
										$this->assign('error','用户邮箱不存在');
								if(!$j)
										$this->assign('error','密码输入错误');
							}
						}
					}	
					
					$this->display();	
    	}
    	
    	
    	
    	public function launch(){
    		
  		
    			 	if($_COOKIE['userid']==0){
    			 			$this->assign('error',"您还没有登录，请登录后继续刚才的操作");
    			 			$this->display('login');
    			 	}else{
    			 	
    			 		$this->display();
 	
    			 	}

    	}
 
    	public function add(){			//增加投票模块
   		
   			$rules = array(
		 	  	array('title','require','主题不能为空！'), //默认情况下用正则进行验证
    			array('title','','该主题已经存在，请稍作修改',0,'unique',1), // 在新增的时候验证name字段是否唯一
		  	  array('fqname','require','发起者姓名不能为空'), //默认情况下用正则进行验证
		  	  array('endtime','require','请选择您的结束时间'), //默认情况下用正则进行验证
			
				);
			
				$data['title']=$_POST['title'];
				$data['fqname']=$_POST['fqname'];
				$data['choice']=$_POST['choice'];
				$data['startime']=date('Y-m-d');
				$data['endtime']=$_POST['endtime'];
				$data['zt']=2;
				$data['count']=0;
				

				if($this->title->validate($rules)->create($data)){
						$tid=$this->title->add();
							
						echo "<script language='javascript'>alert('发起投票成功');</script>";
						$url="<script>location.href='__URL__/opti/tid/".$tid."';</script>"; 
						$this->assign('url',$url);
						$this->display('tz');			
				}else{
					$this->assign('error',$the->getError());
					$this->display('launch');
				}
			
   	}
    	
    	
    public function opti(){			//详情 及 修改模块
   		  			
   		$id=$_GET['tid'];		//获取传来的主题id
    		

    		
    	$tj['tid']=$id;													//判断传递过来的id是否存在
    	$pd=$this->title->where($tj)->select();	
    	
    	if(count($pd)==0 or count($pd)!=1){
    		echo "<script language='javascript'>alert('异常数据错误！');window.close();</script>";
   			exit;
    	}else{
    		$where['extend']=$id;
				$date=$this->opt->where($where)->select();
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
    	
   			$this->display();
   		
   	}

   	public function thed(){
   		
   		
   		if(isset($_GET['bh'])){
   				$bh=$_GET['bh'];
   				

   				
   				switch($bh){
   						
   						case '1':
   								$tj['tid']=$_GET['tid'];

									$jg=$this->title->where($tj)->setInc('zt',1);
									if($jg==1){
												$url="<script language='javascript'>alert('主题成功结束');location.href='__URL__/launch';</script>";
												$this->assign('url',$url);
												$this->display('tz');
												exit;
									}else{
											echo "<script language='javascript'>alert('修改错误');window.close();</script>";
											exit;
								}	
   											
   							
   								break;
   					
   						case '2':
   								$thtj['tid']=$_POST['tid'];
   								   								
   								$rules = array(
   										array('cho','require','选项不能为空！'), //默认情况下用正则进行验证
			   							array('cho','','该选项已经存在！',0,'unique',1), 
									);
						
									$data['cho']=$_POST['cho'];
					 			 	$data['extend']=$_POST['tid'];
									$data['choice']=$_POST['choice'];
									$data['num']=0;
   								
   								if($this->opt->validate($rules)->create($data)){
												$tid=$this->opt->add();
												$zt['zt']=0;
												
												$this->title->where($thtj)->setInc('opnum',1);
												$this->title->where($thtj)->save($zt);
												
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
    	
  
    	
    	
    	
}