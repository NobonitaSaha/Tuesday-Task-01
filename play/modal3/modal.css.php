/* ------------------------ 
	Cookie Popup Start 
---------------------------- */
.cookie-popup {
    display: none;
    position: fixed;
    left: 0;
    right: 0;
    background-color: #ffffff;
    padding: 20px;
    top: 0px;
    z-index: 1000;
    color: #3b3e4a;
	border: 1px solid rgb(80, 80, 80);
    border-radius: 8px;
    box-shadow: 0 6px 6px rgba(0,0,0,.25);
    transform: translateY(170px);
    font-family: "Poppins", sans-serif;
}

.cookie-png{
    display: flex;
    gap: 8px;
    align-items: center;
}

.cookie-png > img{
    width: 42px;
}

.cookie-png > h3{
    color: #674230;
    font-size: 18px;
    font-weight: 700;
    margin-top: 4px;
}

.cookie-description {
    display: flex;
    gap: 60px;
    padding-top: 15px;
    align-items: center;
}

.cookie-text > p {
    font-size: 15px;
    line-height: 25px;
}

.cookie-popup.show {
    display: block;
    max-width: 732px;
    margin: 0 auto;
}


button.btn-3 {
    font-size: 1em;
    padding: 6px 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 100px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    transition-duration: 0.2s;
    transition-timing-function: ease-in-out;
    background-color: #115cfa;
    color: rgb(255, 255, 255);
    border: 0px;
    line-height: 1.7 !important;
    outline: 0px;
}

.cookie-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.91);
    z-index: 999;
    display: none; 
}

.show-overlay {
    display: block; 
}

@media only screen and (max-width: 575px) and (min-width: 320px){
	.cookie-popup.show {
        transform: translateY(120px);
        margin: 0px 8px;
	}
	
    .cookie-description{
        display: flex;
        flex-direction: column;
        padding-top: 10px;
        gap: 10px;
    }

	.cookie-btn {
		width: 100%;
	}

    button.btn-3 {
        width: 100%;
    }
}
/* ------------------------ 
	Cookie Popup End 
---------------------------- */
