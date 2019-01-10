# 截取字符串
```
<#if productName?? && (productName?html)?length lte 12>
    ${productName}
<#else>
    ${(productName?html)[0..11]}...
</#if>
```
