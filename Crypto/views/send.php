<?php
header('Access-Control-Allow-Origin: *');

require_once('../../General/views/header.php');

require_once('dash-1.html');

?>

<style>
.content {
    height: 80vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    /* border: 2px solid #ccc; */
    border-radius: 10px;
    background-color: #23272a;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.wallet-info {
    background-color: #3f4349;
    border: 2px solid black;
}

.receiver-info {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.add-wrapper {
    width: 100%;
    background-color: #ffffff;
    color: black;
    border: 1px solid white;
    border-radius: 500px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

p {
    margin: 0;
}

.wi-wrapper {
    padding: 1rem;
}

#user-balance {
    margin-top: .3rem;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.input {
    padding: .3rem 1rem .3rem 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.label {
    font-size: 1.2rem;
    margin-bottom: .5rem;
    margin-top: 1rem;
}

input {
    width: 100%;
    border: 1px solid black;
    border-radius: 5px;
    margin-bottom: .5rem;
    font-size: 1.8rem;
}

.button-buy {
    width: 100%;
    margin: 1rem 0;
    font-size: 1.8rem;
}
</style>


<h1>
    Send Crytocurrency
</h1>

<div class="content">
    <div class="box">
        <button class="button-main">Connect to MetaMask 🦊</button>
        <div class="reciever-info">
            <div class="wallet-info">
                <div class="wi-wrapper">
                    <p>You Have:</p>
                    <p id="user-balance"></p>
                    <div class="add-wrapper">
                        <p id="user-wallet"></p>
                    </div>
                </div>
            </div>
            <div class="input">
                <div class="label">Receiver's Wallet Address</div>
                <input type="text" name="reciever" id="reciever">
                <div class="label">Amount</div>
                <input type="number" name="amount" id="amount">
                <div class="label">Your Private Key</div>
                <input type="text" name="private-key" id="private-key">
                <button class="button-buy">Send 💸</button>
            </div>
        </div>
    </div>
</div>


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
const recieverInfo = document.querySelector(".reciever-info");

recieverInfo.style.display = "none";
button.addEventListener("click", () => loginToMetaMask());

// Connect to metamask
const loginToMetaMask = async () => {
    console.log("Logging in to MetaMask...");
    if (!window.ethereum) {
        alert("MetaMask is not installed. Please install MetaMask first!");
        return;
    }

    let accounts = await window.ethereum.request({
        method: "eth_requestAccounts",
    });

    window.userWalletAddress = accounts[0];
    userWallet.innerHTML = window.userWalletAddress;

    const balance = await provider.getBalance(window.userWalletAddress);
    userBalance.innerHTML = ethers.utils.formatEther(balance) + " ETH";
    recieverInfo.style.display = "block";
    button.style.display = "none";
};

// Conduct transaction
bBuy.addEventListener("click", async () => {
    console.log("Sending transaction...");
    const reciever = document.getElementById("reciever").value.trim();
    const amount = document.getElementById("amount").value.trim();
    const privateKey = document.getElementById("private-key").value.trim();

    const wallet = new ethers.Wallet(privateKey, provider)


    try {
        const tx = await wallet.sendTransaction({
            to: reciever,
            value: ethers.utils.parseEther(amount)
        })
        await tx.wait();
        const balance = await provider.getBalance(window.userWalletAddress);
        userBalance.innerHTML = ethers.utils.formatEther(balance) + " ETH";
        alert("Transaction successful");

    } catch {
        alert("Transaction failed");
    }

});
</script>


<?php
require_once('dash-2.html');