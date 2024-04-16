

/* ------------------------ 
	Cookie Popup Start 
---------------------------- */
.cookie-popup {
    display: none;
    position: fixed;
    left: 0;
    right: 0;
    background-color: rgb(43, 43, 43);
    padding: 20px;
    top: 0px;
    z-index: 1000;
    transform: translate(0, 150px);
    color: rgb(233, 233, 233);
	border: 1px solid rgb(80, 80, 80);
    border-radius: 8px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 2px 8px 0px;	
}

.cookie-content > h2 {
    font-size: 24px;
    padding: 5px 0px 5px 0px;
}

.cookie-popup.show {
    display: block;
    max-width: 732px;
    margin: 0 auto;
}

span.cookie-close {
    color: white;
    float: inline-end;
    margin: -15px  0px;
}

span.cookie-close:hover{
	color: white;
}

button.btn-1 {
    font-size: 1em;
    padding: 12px 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    transition-duration: 0.2s;
    transition-timing-function: ease-in-out;
    background-color: transparent;
    color: rgb(255, 255, 255);
    border: 0px;
    margin: 0px 0px 0px 12px !important;
    line-height: 1.7 !important;
    outline: 0px;
}

button.btn-2 {
    font-size: 1em;
    padding: 12px 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    transition-duration: 0.2s;
    transition-timing-function: ease-in-out;
    background-color: transparent;
    color: rgb(255, 255, 255);
    border: 1px solid rgb(32, 85, 187);
    margin: 0px 0px 0px 12px !important;
    line-height: 1.7 !important;
    outline: 0px;
}

button.btn-3 {
    font-size: 1em;
    padding: 12px 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    transition-duration: 0.2s;
    transition-timing-function: ease-in-out;
    background-color: rgb(32, 85, 187);
    color: rgb(255, 255, 255);
    border: 0px;
    margin: 0px 0px 0px 12px !important;
    line-height: 1.7 !important;
    outline: 0px;
}
button.btn-2:hover{
	background-color: rgba(61, 152, 243, 0.2);
}

.cookie-btn {
    display: flex;
    float: inline-end;
}

.cookie-img {
    background: rgb(63, 63, 63);
}

.cookie-img {
    background: rgb(63, 63, 63);
    padding: 18px;
    margin: 90px -20px -20px -20px;
    border-radius: 0px 0px 6px 6px;
}

.cookie-img > img{
	width: 65px;
}

.cookie-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.71);
    z-index: 999;
    display: none; 
}

.show-overlay {
    display: block; 
}

@media only screen and (max-width: 575px) and (min-width: 320px){
	.cookie-popup.show {
		margin: 0 8px;
	}
	.cookie-btn {
		display: flex;
		flex-direction: column-reverse;
		float: unset;
	}
	
	.cookie-double-btn {
		display: flex;
	}
	
	.cookie-popup {
		transform: translate(0, 100px);
	}
	
	.cookie-img {
		margin: 15px -20px -20px -20px;
	}
	
	button.btn-2 {
		margin: 0px 0px 0px 0px !important;
		width: 100%;
		font-size: 14px;
	}
	
	button.btn-3 {
		width: 100%;
		font-size: 14px;
	}
	
	button.btn-1 {
		font-size: 14px;
	}
	
	.cookie-single-btn {
		text-align: center;
		margin: 12px 0px 0px 0px;
	}
}

span.cookie-close {
  color: white;
  float: inline-end;
  margin: -15px 0px;
}
.popup-close {
  color: #151719;
  font-size: 30px;
  cursor: pointer;
  margin-left: 260px;
}

/* ------------------------ 
	Cookie Popup End 
---------------------------- */



