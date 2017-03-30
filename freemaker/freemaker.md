# 截取字符串
```
<#if userFavorite.product.productName?? && (userFavorite.product.productName?html)?length lte 12>
    ${userFavorite.product.productName}
<#else>
    ${(userFavorite.product.productName?html)[0..11]}...
</#if>
```