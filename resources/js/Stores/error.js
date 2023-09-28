import { reactive } from "vue"

export default reactive({
    items1:[],

add1(error) {
    this.items1.unshift({
        key1: Symbol(),
        ...error
    });
},

remove1(index1) {
    this.items1.splice(index1, 1);
},

});