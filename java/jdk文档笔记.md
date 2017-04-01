# java.lang.Boolean
```java
package com.klaus.learn.lang.Boolean;

import java.util.HashMap;
import java.util.Map.Entry;

public class BooleanLearn {
	static BooleanLearn booleanLearn = new BooleanLearn();

	public static void main(String[] args) {
		构造方法();
		parseBoolean();
		hashcode();
		compareTo();
	}

	// 如果 String 参数不为 null 且在忽略大小写时等于 "true"，则分配一个表示 true 值的 Boolean 对象。否则分配一个表示
	// false 值的 Boolean 对象。
	static void 构造方法() {
		HashMap<String, Boolean> bool = new HashMap<String, Boolean>();
		boolean b1 = new Boolean("true");
		boolean b2 = new Boolean("True");
		boolean b3 = new Boolean("YES");
		bool.put("b1", b1);
		bool.put("b2", b2);
		bool.put("b3", b3);
		booleanLearn.print(bool);
	}

	/**
	 * 常用方法
	 */

	/**
	 * 将字符串参数解析为 boolean 值。如果 String 参数不是 null 且在忽略大小写时等于 "true"，则返回的 boolean 表示
	 * true 值。
	 */
	static void parseBoolean() {
		HashMap<String, Boolean> bool = new HashMap<String, Boolean>();
		boolean b1 = Boolean.parseBoolean("True");
		boolean b2 = Boolean.parseBoolean("yes");
		bool.put("b1", b1);
		bool.put("b2", b2);
		booleanLearn.print(bool);
	}

	/**
	 * 如果此对象表示 true 则返回整数 1231；如果表示 false 则返回整数 1237。
	 */
	static void hashcode() {
		System.out.println("==================" + "hashCode" + "==================");
		System.out.println("TRUE的哈希值：" + Boolean.TRUE.hashCode());
		System.out.println("FALSE的哈希值：" + Boolean.FALSE.hashCode());
	}

	/**
	 * 如果对象与参数表示的布尔值相同，则返回零；如果此对象表示 true，参数表示 false，则返回一个正值；如果此对象表示 false，参数表示
	 * true，则返回一个负值
	 */
	static void compareTo() {
		System.out.println("==================" + "compareTo" + "==================");
		int doubleTrue = Boolean.TRUE.compareTo(true);
		System.out.println("doubleTrue:" + doubleTrue);
		int diff = Boolean.TRUE.compareTo(false);
		System.out.println("diff:" + diff);
		int diff2 = Boolean.FALSE.compareTo(true);
		System.out.println("diff2:" + diff2);
	}

	/*
	 * =========================================输出================================
	 */
	public void print(HashMap<String, Boolean> bool) {
		// 输出哪个方法调用当前方法
		String methodName = new Exception().getStackTrace()[1].getMethodName();
		System.out.println("==================" + methodName + "==================");
		for (Entry<String, Boolean> entry : bool.entrySet()) {
			System.out.println(entry.getKey() + "的值:" + entry.getValue());
		}

	}
}

```