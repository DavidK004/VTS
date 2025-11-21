const axis = {
    members: ['Aqua', 'Megumin', 'AxisBot'],
    rules: {
        'Aqua': 'Aqua is the goddess of water and is known for her clumsiness and comedic personality.',
        'Megumin': 'Megumin is a powerful archmage who specializes in explosion magic, but can only cast one spell per day.',
        'AxisBot': 'AxisBot is a robot created by the Axis cult, designed to assist in their comedic and chaotic endeavors.'
    },
    getRandomMember: function() {
        const randomIndex = Math.floor(Math.random() * this.members.length);
        return this.members[randomIndex];
    }
}

const eris ={
    members: ['Eris', 'Darkness', 'ErisBot'],
    rules: {
        'Eris': 'Eris is the goddess of fortune and is known for her mischievous and playful nature.',
        'Darkness': 'Darkness is a crusader who is obsessed with pain and suffering, often putting herself in harm\'s way for the sake of others.',
        'ErisBot': 'ErisBot is a robot created by the Eris cult, designed to assist in their mischievous and playful endeavors.'
    },
    getRandomMember: function() {
        const randomIndex = Math.floor(Math.random() * this.members.length);
        return this.members[randomIndex];
    }
}

const konosuba = {
    religions: [axis, eris],
    cities:{
        'Axis City': {
            description: 'A city dedicated to the worship of Aqua and her followers, known for its comedic atmosphere and chaotic events.',
            rules: axis.rules
        },
        'Eris City': {
            description: 'A city dedicated to the worship of Eris, known for its playful and mischievous nature.',
            rules: eris.rules
        }
    },
    getBetterReligion: function(){
        return this.religions[0];
    }
}

let writeOutObjectData = (obj) => {
    for(let key in obj){
        if(typeof obj[key] === 'object') {
            console.log(`${key}:`);
            writeOutObjectData(obj[key]);
            continue;
        }
        console.log(`${key}: ${obj[key]}`);
    }
}
writeOutObjectData(axis);
writeOutObjectData(eris);
writeOutObjectData(konosuba);

let getLargestNumber = (arr) => {
    let largest = arr[0];
    for(let i = 1; i < arr.length; i++) {
        if(arr[i] > largest) {
            largest = arr[i];
        }
    }
    return largest;
}

let getSmallestNumber = (arr) => {
    let smallest = arr[0];
    for(let i = 1; i < arr.length; i++) {
        if(arr[i] < smallest) {
            smallest = arr[i];
        }
    }
    return smallest;
}

const nums = [5, 3, 8, 1, 4];
console.log(getLargestNumber(nums)); // 8
console.log(getSmallestNumber(nums)); // 1