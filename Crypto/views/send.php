<?php
header('Access-Control-Allow-Origin: *');

require_once('../../General/views/header.php');

require_once('dash-1.html');

?>


<h1>
    Send Crytocurrency
</h1>

<button class="button-main">Connect to MetaMask 🦊</button>
<p id="user-wallet"></p>
<p id="user-balance"></p>
<input type="text" name="reciever" id="reciever">
<br>
<input type="number" name="amount" id="amount">
<button class="button-buy">
    Send
</button>


<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript">
</script>

<script>
console.log("Ethers loaded");
window.userWalletAddress = null;
const provider = new ethers.providers.Web3Provider(window.ethereum, "any");
const button = document.querySelector("button");
const userBalance = document.getElementById("user-balance");
const userWallet = document.getElementById("user-wallet");
const bBuy = document.querySelector(".button-buy");

bBuy.style.display = "none";
button.addEventListener("click", () => loginToMetaMask());

const loginToMetaMask = async () => {
    console.log("Logging in to MetaMask...");
    if (!window.ethereum) {
        alert("MetaMask is not installed. Please install MetaMask first!");
        return;
    }

    let accounts = await window.ethereum.request({
        method: "eth_requestAccounts",
    });

    button.addEventListener("click", () => loginToMetaMask());

    window.userWalletAddress = accounts[0];
    userWallet.innerHTML = "Your wallet address: " + window.userWalletAddress;

    const balance = await provider.getBalance(window.userWalletAddress);
    userBalance.innerHTML = "Your balance: " + ethers.utils.formatEther(balance) + " ETH";
    bBuy.style.display = "block";
    button.disabled = true;
};

bBuy.addEventListener("click", () => {
    const reciever = document.getElementById("reciever").value;
    const amount = document.getElementById("amount").value;

    console.log("Sending transaction...");
    console.log(reciever);
    console.log(amount);

    const tx = providers.send


});
</script>


<?php
require_once('dash-2.html');