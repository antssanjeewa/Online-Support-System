import{_ as f}from"./_plugin-vue_export-helper-c27b6911.js";import{e as a,a as i,g as l,t as c,n as u,F as _,h,o as n}from"./app-cf863262.js";const v={props:{meta:Object,links:Object,filters:Object},computed:{pages(){var s=Math.ceil(this.meta.total/this.meta.per_page),t=this.meta.current_page;if(s<10)return s;if(t<5)return[1,...this.range(-t+2,7-t),"...",s];if(t>s-4){var e=s-t;return[1,"...",...this.range(s-t-6,e-1),s]}else return[1,"...",...this.range(-2,2),"...",s]}},methods:{range(s,t){const e=[],g=this.meta.current_page;for(let o=s;o<=t;o++)e.push(g+o);return e}}},b={class:"bg-gray-100 px-4 py-3 flex justify-between border-t border-gray-200 sm:px-6"},y={class:"hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"},x={class:"text-sm leading-5 text-gray-700 dark:text-gray-100"},p={class:"font-medium"},k={class:"font-medium"},w={class:"font-medium"},j={class:"relative z-0 inline-flex shadow-sm print-none"},C=["onClick"],N={key:2,class:"paginate-btn text-gray-400"};function P(s,t,e,g,o,m){return n(),a("div",b,[i("div",y,[i("div",null,[i("p",x,[l(" Showing "),i("span",p,c(e.meta.from),1),l(" to "),i("span",k,c(e.meta.to),1),l(" of "),i("span",w,c(e.meta.total),1),l(" results ")])]),i("div",j,[e.links.prev===null?(n(),a("div",{key:0,class:u(["paginate-btn text-gray-400",{"ml-auto":e.links.prev}])}," Previous ",2)):(n(),a("button",{key:1,class:"paginate-btn hover:bg-gray-400 hover:text-white focus:border-indigo-500",onClick:t[0]||(t[0]=r=>e.filters.page-=1)}," Previous ")),(n(!0),a(_,null,h(m.pages,(r,d)=>(n(),a(_,null,[r!="..."?(n(),a("button",{key:d,class:u(["paginate-btn hover:bg-gray-400 hover:text-white focus:outline-none",{"bg-gray-500 text-white   font-bold":r===e.meta.current_page}]),onClick:B=>e.filters.page=r},c(r),11,C)):(n(),a("p",{key:d+"a",class:"mr-1 mb-1 px-4 py-2"},"..."))],64))),256)),e.links.next===null?(n(),a("div",N,"Next")):(n(),a("button",{key:3,class:"paginate-btn hover:bg-gray-400 hover:text-white focus:border-indigo-500",onClick:t[1]||(t[1]=r=>e.filters.page?e.filters.page+=1:e.filters.page=2)}," Next "))])])])}const F=f(v,[["render",P],["__scopeId","data-v-d69cef75"]]);export{F as default};