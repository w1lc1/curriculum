let numbers = [2, 5, 12, 13, 15, 18, 22];

function isEven() {
    for (let i = 0; i < numbers.length; i++) {
        if (numbers[i] % 2 === 0) {
            console.log(numbers[i] + 'は偶数です');
        }
    }
}

isEven();

class Car {
    constructor(gasoline, number) {
        this.gasoline = gasoline;
        this.number = number;
    }

    getNumGas() {
        console.log(`ガソリンは${this.gasoline}です。ナンバーは${this.number}です`);
    }
}

// Carクラスのインスタンスを作成
const myCar = new Car("レギュラー", "12-34");

// ガソリンとナンバーを出力
myCar.getNumGas();
