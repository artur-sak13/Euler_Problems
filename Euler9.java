public class Euler9 {
	public static void main(String [] args) {
		System.out.println(findTriplet());
	}

	public static long findTriplet() {
		int a = 0, b = 0, c = 0;
		int s = 1000;
		for(a = 1; a < s / 3; a++) {
			for(b = a; b < s / 2; b++) {
				c = s - a - b;
				if(a * a + b * b == c * c) {
					return product(a,b,c);
				}
			}
		}
		return 0;
	}


	public static long product (int x, int y, int z) {
		return x * y * z;
	}
}