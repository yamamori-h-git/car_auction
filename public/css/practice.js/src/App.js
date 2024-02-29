import React, {useState} from 'react';

function App() {
  // stateの初期値を0で設定
  const [count, setCount] = useState(0);

  // ボタンクリック時の処理
  const incrementCount = () => {
    setCount(count + 1);
  };

  // ボタンクリック時の処理
  const decrementCount = () => {
    setCount(count - 1);
  };

  // ボタンクリック時の処理
  const Reset = () => {
    setCount(count - count);
  };


  return (
    <div>
      <p>カウント: {count}</p>
      <button onClick={incrementCount}>増やす</button>
      <button onClick={decrementCount}>減らす</button>
      <button onClick={Reset}>リセット</button>
    </div>

  );

}

function App2 () {
  const [messages, setMessages] = useState([]);
  console.log(messages);
  const [newMessage, setNewMessage] = useState('');
  console.log(newMessage);
  const addMessage = () => {
    if(newMessage.trim() !== '') {
      setMessages([...messages, newMessage]);
      setNewMessage('');
    }
    console.log(messages);
  }

  const deleteMessage = () => {
    const bufMessage = [...messages];
    bufMessage.splice(messages,1);
    setMessages(bufMessage);
  }

  return (
    <div>
      <h1>掲示板アプリ</h1>
      <input type="text" value={newMessage} onChange={(e) => setNewMessage(e.target.value)} placeholder='新しいメッセージを投稿'/>
      <button onClick={addMessage}>投稿</button>
      <ul>
        {messages.map((message,index) => (
          <li key={index}>{message}　<button onClick={() => deleteMessage({message})}>削除</button></li>
          
        ))}
      </ul>
      
    </div>
    
  
  );
}





export default App2;




