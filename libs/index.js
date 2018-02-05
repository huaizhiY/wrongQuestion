(function(){
	
	
	/*添加 功能*/

	function getEle(select){
		return document.querySelectorAll(select)
	}

	let save_btn = getEle("#wq-save-question")[0];

	let content = getEle("#wq-content")[0];
	let where = getEle("#wq-where")[0];
	let idea = getEle("#wq-idea")[0];
	//console.log(save_btn);

	let tbody = getEle("#tbody")[0];

	save_btn.onclick = function(){
		let send_msg = `title=${content.value}&details=${where.value}&idea=${idea.value}`;
		//console.log(send_msg);
		xhr.post("interface/addwq.php",send_msg,function(res){
			//console.log(res);

			location.reload();//刷新页面
		})
	}

	/*列表渲染功能*/


	xhr.get("interface/showlist.php",function(res){
		let list_json = "";
		try{
			list_json = JSON.parse(res);
		}catch(e){
			console.log("数据格式错误")
		}
		//console.log(list_json);
		rending_page(list_json);

	})

	function rending_page(json){
		let template = "";
		json.details.forEach(function(item,index){
			template += `<tr class="text-center middle">
						<td>${index+1}</td>
						<td>${item.wq_title}</td>
						<td>${item.wq_details}</td>
						<td>
							<a 
								href="#" 
								data-toggle="popover"
								data-content="${item_content(item.wq_idea,"data")}" 
							>${item_content(item.wq_idea,"content")}
							</a>
						</td>
						<td>
							<button class="btn" data-id="${item.wq_id}">删除</button>
						</td>
						<td>
							<button class="btn">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</button>
						</td>
					</tr>`

		})
		tbody.innerHTML = template;

		//启用bootstrap插件；
		$('[data-toggle="popover"]').popover()
	}

	function item_content(str,opt){
		//截取字符串组件；
		if(opt == "data"){

			if(str.length < 16){
				return "";
			}else{
				return str;
			}
		}else if(opt == "content"){
			if(str.length < 16){
				return str;
			}else{
				return str.substring(0,15)+"..."
			}
		}
	}


	//删除功能; (事件委托);

	tbody.onclick = function(event){
		let e = event || window.event;
		let target = e.target || e.srcElement.target;
		if(target.getAttribute("class") == "btn"){
			remove_item(target.getAttribute("data-id"));
			target.parentNode.parentNode.remove();
		}
	}

	function remove_item(id){
		//console.log(id)
		xhr.post("interface/removeitem.php","id="+id,function(){
			console.log("删除成功");
		})
	}

})()