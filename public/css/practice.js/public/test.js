import React, {useState} from 'react';

function App(){
    // stateの初期値を0で設定
    const [count, setCount] = useState(0);

    // ボタンクリック時の処理
    const incrementCount = () => {
        setCount(count + 1);
    };

    return {
        <div>
        <p>カウント: {count}</p>
        <button onClick={incrementCount}>増やす</button>
        </div>

    };
}